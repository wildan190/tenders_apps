<?php

// app/Http/Controllers/Admin/SuratPenyampaianController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPenyampaian;
use App\Models\DataTender;
use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class SuratPenyampaianController extends Controller
{
    public function index()
    {
        $suratPenyampaians = SuratPenyampaian::with('dataTender')->get();
        $suratPenyampaians = SuratPenyampaian::paginate(10);
        return view('admin.surat_penyampaians.index', compact('suratPenyampaians'));
    }

    public function create()
    {
        $dataTenders = DataTender::all();
        return view('admin.surat_penyampaians.create', compact('dataTenders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_surat_penyampaian' => 'required|string',
            'tahun' => 'required|numeric',
            'sifat' => 'required|string',
            'destinasi_kepada' => 'required|string',
            'lampiran' => 'required|string',
            'perihal' => 'required|string',
            //'ppk' => 'required|string',
            'kepala_balai' => 'required|string',
            'nip' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
        ]);

        SuratPenyampaian::create($request->all());

        Alert::success('Success', 'Surat Penyampaian created successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }

    public function show($id)
    {
        $suratPenyampian = SuratPenyampaian::with('dataTender')->findOrFail($id);

        // Ambil nilai kd_tender dari relasi dataTender
        $kd_tender_value = $suratPenyampian->dataTender->kd_tender;

        return view('admin.surat_penyampaians.show', compact('suratPenyampian', 'kd_tender_value'));
    }

    public function exportPdf($id)
    {
        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $kd_tender_value = $suratPenyampian->dataTender->kd_tender;

        $pdf = PDF::loadView('admin.surat_penyampaians.export-pdf', compact('suratPenyampian', 'kd_tender_value'));

        return $pdf->download('surat_penyampian_' . $id . '.pdf');
    }

    public function edit($id)
    {
        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $dataTenders = DataTender::all();

        return view('admin.surat_penyampaians.edit', compact('suratPenyampian', 'dataTenders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_surat_penyampaian' => 'required|string',
            'tahun' => 'required|numeric',
            'sifat' => 'required|string',
            'destinasi_kepada' => 'required|string',
            'lampiran' => 'required|string',
            'perihal' => 'required|string',
            'kepala_balai' => 'required|string',
            'nip' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
        ]);

        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $suratPenyampian->update($request->all());

        Alert::success('Success', 'Surat Penyampaian updated successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }


    public function destroy(SuratPenyampaian $suratPenyampian)
    {
        $suratPenyampian->delete();

        Alert::success('Success', 'Surat Penyampaian deleted successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }
}
