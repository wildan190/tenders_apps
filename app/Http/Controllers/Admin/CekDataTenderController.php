<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CekDataTender;
use App\Models\CekPersonil;
use App\Models\DataTender;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class CekDataTenderController extends Controller
{
    public function index()
    {
        $cekDataTenders = CekDataTender::with(['cekPersonil', 'dataTender'])->get();
        $cekDataTenders = CekDataTender::paginate(10);
        return view('admin.cek_data_tenders.index', compact('cekDataTenders'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $cekDataTenders = CekDataTender::when($keyword, function (Builder $query) use ($keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('cek_personil_id', 'like', '%' . $keyword . '%')
                    ->orWhere('status', 'like', '%' . $keyword . '%');
            });
        })->paginate(10);

        if ($cekDataTenders->isEmpty()) {
            Alert::info('Info', 'Data tidak ditemukan.');
        }

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
            'cek_personil_id.*' => 'required|exists:cek_personils,id',
            'data_tender_id.*' => [
                'required',
                'exists:data_tenders,id',
                Rule::unique('cek_data_tenders', 'data_tender_id')->where(function ($query) use ($request) {
                    $dataTender = DataTender::findOrFail($request->data_tender_id)->first();
                    return $dataTender && Carbon::parse($dataTender->tanggal_penetapan)->isFuture();
                }),
            ],
        ]);

        foreach ($validatedData['cek_personil_id'] as $index => $cekPersonilId) {
            $data = [
                'cek_personil_id' => $cekPersonilId,
                'data_tender_id' => $validatedData['data_tender_id'][$index],
            ];

            $cekDataTender = CekDataTender::create($data);

            $cekDataTender->updateStatus();
        }

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
            'cek_personil_id' => 'required|exists:cek_personils,id'
        ]);

        $cekDataTender->update($validatedData);
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

        $now = Carbon::now();
        $tanggalPenetapan = Carbon::parse($dataTender->tanggal_penetapan);
        $tanggalKontrak = Carbon::parse($dataTender->tanggal_kontrak);
        $waktuPelaksanaan = Carbon::parse($dataTender->waktu_pelaksanaan);

        $status = null;
        if ($now->greaterThanOrEqualTo($waktuPelaksanaan->endOfDay())) {
            $status = 'SELESAI';
        } elseif ($now->greaterThanOrEqualTo($tanggalKontrak->startOfDay())) {
            $status = 'DIKERJAKAN';
        } elseif ($now->greaterThanOrEqualTo($tanggalPenetapan->startOfDay())) {
            $status = 'DITETAPKAN';
        }

        $cekDataTender->update(['status' => $status]);
    }

    public function updateStatusAll()
    {
        $cekDataTenders = CekDataTender::all();

        foreach ($cekDataTenders as $cekDataTender) {
            $this->updateStatus($cekDataTender);
        }

        Alert::success('Success', 'Status for all IDs has been updated.');
        return redirect()->route('admin.cek_data_tenders.index');
    }
}
