<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataSuratKeputusan;
use App\Models\DataTender;
use App\Models\CekPersonil;
use Illuminate\Support\Facades\Validator;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class DataSuratKeputusanController extends Controller
{
    public function index()
    {
        $dataSuratKeputusan = DataSuratKeputusan::with(['dataTender', 'namaPersonil'])->get();
        return view('admin.data_surat_keputusan.index', compact('dataSuratKeputusan'));
    }

    public function create()
    {
        $dataTenders = DataTender::all();
        $cekPersonils = CekPersonil::all();
        return view('admin.data_surat_keputusan.create', compact('dataTenders', 'cekPersonils'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_sk' => 'required|string',
            'nomor_surat' => 'required|string',
            'tahun' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'pembuat_komitmen' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_surat_keputusan.create')
                ->withErrors($validator)
                ->withInput();
        }

        DataSuratKeputusan::create($request->all());

        Alert::success('Success', 'Data Surat Keputusan berhasil ditambahkan.');

        return redirect()->route('admin.data_surat_keputusans.index');
    }

    public function edit($id)
    {
        $dataSuratKeputusan = DataSuratKeputusan::findOrFail($id);
        $dataTenders = DataTender::all();
        $cekPersonils = CekPersonil::all();
        return view('admin.data_surat_keputusan.edit', compact('dataSuratKeputusan', 'dataTenders', 'cekPersonils'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_sk' => 'required|string',
            'nomor_surat' => 'required|string',
            'tahun' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'pembuat_komitmen' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_surat_keputusan.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $dataSuratKeputusan = DataSuratKeputusan::findOrFail($id);
        $dataSuratKeputusan->update($request->all());

        Alert::success('Success', 'Data Surat Keputusan berhasil diperbarui.');

        return redirect()->route('admin.data_surat_keputusans.index');
    }

    public function show($id)
    {
        // Ambil data surat keputusan berdasarkan ID
        $dataSuratKeputusan = DataSuratKeputusan::with('dataTender')->findOrFail($id);

        // Tampilkan halaman show dengan data surat keputusan
        return view('admin.data_surat_keputusan.show', compact('dataSuratKeputusan'));
    }

    public function destroy($id)
    {
        $dataSuratKeputusan = DataSuratKeputusan::findOrFail($id);
        $dataSuratKeputusan->delete();

        Alert::success('Success', 'Data Surat Keputusan berhasil dihapus.');

        return redirect()->route('admin.data_surat_keputusans.index');
    }


    public function exportPDF($id)
    {
        $dataSuratKeputusan = DataSuratKeputusan::findOrFail($id);

        $pdf = PDF::loadView('admin.data_surat_keputusan.export_pdf', compact('dataSuratKeputusan'));

        return $pdf->stream('surat_keputusan.pdf');
    }
}
