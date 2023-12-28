<?php

// app/Http/Controllers/Admin/CekDataTenderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CekDataTender;
use App\Models\CekPersonil;
use App\Models\DataTender;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CekDataTenderController extends Controller
{
    public function index()
    {
        $cekDataTenders = CekDataTender::with(['cekPersonil', 'dataTender'])->get();
        return view('admin.cek_data_tenders.index', compact('cekDataTenders'));
    }

    public function create()
    {
        $cekPersonils = CekPersonil::all();
        $dataTenders = DataTender::all();
        return view('admin.cek_data_tenders.create', compact('cekPersonils', 'dataTenders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cek_personil_id' => 'required|exists:cek_personils,id',
            'data_tender_id' => [
                'required',
                'exists:data_tenders,id',
                Rule::unique('cek_data_tenders')->where(function ($query) use ($request) {
                    // Ambil data tanggal_penetapan dari DataTender
                    $tanggalPenetapan = DataTender::findOrFail($request->data_tender_id)->tanggal_penetapan;

                    // Jika tanggal_penetapan sudah lewat, validasi akan gagal
                    return Carbon::parse($tanggalPenetapan)->isFuture();
                }),
            ],
        ]);

        $cekDataTender = CekDataTender::create($validatedData);

        // Update status
        $this->updateStatus($cekDataTender);

        Alert::success('Success', 'Data cek data tender berhasil disimpan.');
        return redirect()->route('admin.cek_data_tenders.index');
    }

    public function show($id)
    {
        $cekDataTender = CekDataTender::with(['cekPersonil', 'dataTender'])->findOrFail($id);
        return view('admin.cek_data_tenders.show', compact('cekDataTender'));
    }

    public function edit($id)
    {
        $cekDataTender = CekDataTender::findOrFail($id);
        $cekPersonils = CekPersonil::all();
        $dataTenders = DataTender::all();
        return view('admin.cek_data_tenders.edit', compact('cekDataTender', 'cekPersonils', 'dataTenders'));
    }

    public function update(Request $request, $id)
    {
        $cekDataTender = CekDataTender::findOrFail($id);

        $validatedData = $request->validate([
            'cek_personil_id' => 'required|exists:cek_personils,id',
            'data_tender_id' => 'required|exists:data_tenders,id',
        ]);

        $cekDataTender->update($validatedData);

        $cekDataTender->update($request->all());
        $this->updateStatus($cekDataTender);

        Alert::success('Success', 'Data cek data tender berhasil diperbarui.');
        return redirect()->route('admin.cek_data_tenders.index');
    }

    public function destroy($id)
    {
        $cekDataTender = CekDataTender::findOrFail($id);
        $cekDataTender->delete();

        Alert::success('Success', 'Data cek data tender berhasil dihapus.');
        return redirect()->route('admin.cek_data_tenders.index');
    }


    private function updateStatus(CekDataTender $cekDataTender)
{
    $dataTender = $cekDataTender->dataTender;

    // Menggunakan Carbon untuk manipulasi tanggal
    $now = Carbon::now();
    $tanggalPenetapan = Carbon::parse($dataTender->tanggal_penetapan);
    $tanggalKontrak = Carbon::parse($dataTender->tanggal_kontrak);

    // Logika untuk update status
    dd([
        'now' => $now,
        'tanggalPenetapan' => $tanggalPenetapan,
        'tanggalKontrak' => $tanggalKontrak,
    ]);

    if ($now->greaterThanOrEqualTo($tanggalKontrak->endOfDay())) {
        $cekDataTender->status = 'SELESAI';
    } elseif ($now->greaterThanOrEqualTo($tanggalKontrak->startOfDay())) {
        $cekDataTender->status = 'DIKERJAKAN';
    } elseif ($now->greaterThanOrEqualTo($tanggalPenetapan->startOfDay())) {
        $cekDataTender->status = 'DITETAPKAN';
    }

    $cekDataTender->save();
}



    private function parseWaktuPelaksanaan($waktuPelaksanaan)
    {
        // Pisahkan angka dan satuan (contoh: "12 bulan")
        preg_match('/(\d+)\s*(\w+)/', $waktuPelaksanaan, $matches);

        // Ambil angka dan satuan
        $jumlah = (int)$matches[1];
        $satuan = strtolower($matches[2]);

        // Konversi satuan ke bulan
        switch ($satuan) {
            case 'bulan':
                return $jumlah;
            case 'minggu':
                return $jumlah * 4; // Anggap 1 bulan = 4 minggu
            case 'tahun':
                return $jumlah * 12; // Anggap 1 tahun = 12 bulan
                // Tambahkan case lain sesuai kebutuhan (hari, dll.)
                // ...

            default:
                return 0;
        }
    }
}
