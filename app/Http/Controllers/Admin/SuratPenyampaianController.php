<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPenyampaian;
use App\Models\DataTender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class SuratPenyampaianController extends Controller
{
    public function index()
    {
        $suratPenyampaians = SuratPenyampaian::with('dataTender')->paginate(10);
        return view('admin.surat_penyampaians.index', compact('suratPenyampaians'));
    }

    public function create()
    {
        $dataTenders = DataTender::all();
        return view('admin.surat_penyampaians.create', compact('dataTenders'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        SuratPenyampaian::create($validatedData);

        Alert::success('Success', 'Surat Penyampaian created successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }

    public function show($id)
    {
        $suratPenyampian = SuratPenyampaian::with('dataTender')->findOrFail($id);

        $kdTenderValue = $suratPenyampian->dataTender->kd_tender;

        return view('admin.surat_penyampaians.show', compact('suratPenyampian', 'kdTenderValue'));
    }

    public function exportPdf($id)
    {
        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $kdTenderValue = $suratPenyampian->dataTender->kd_tender;

        $pdf = PDF::loadView('admin.surat_penyampaians.export-pdf', compact('suratPenyampian', 'kdTenderValue'));

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
        $validatedData = $this->validateRequest($request);

        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $suratPenyampian->update($validatedData);

        Alert::success('Success', 'Surat Penyampaian updated successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }

    public function destroy($id)
    {
        $suratPenyampian = SuratPenyampaian::findOrFail($id);
        $suratPenyampian->delete();

        Alert::success('Success', 'Surat Penyampaian deleted successfully!');

        return redirect()->route('admin.surat_penyampaians.index');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
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
    }
}
