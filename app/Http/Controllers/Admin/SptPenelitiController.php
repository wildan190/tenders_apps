<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SptPeneliti;
use App\Models\DataTender;
use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class SptPenelitiController extends Controller
{
    public function index()
    {
        $sptPenelitis = SptPeneliti::paginate(10);
        return view('admin.spt_penelitis.index', compact('sptPenelitis'));
    }

    public function create()
    {
        $dataTenders = DataTender::all();
        return view('admin.spt_penelitis.create', compact('dataTenders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_spt' => 'required|unique:spt_penelitis,nomor_spt',
            'tahun' => 'required|digits:4',
            'kepala_balai' => 'required',
            'nip' => 'required|digits:18',
            'jabatan' => 'required',
            'tanggal_spt' => 'required|date',
            'anggota_peneliti' => 'required',
            'keterangan' => 'nullable',
        ]);

        SptPeneliti::create($request->all());

        Alert::success('Success', 'SPT Peneliti has been created successfully!');
        return redirect()->route('admin.spt_penelitis.index');
    }

    public function show($id)
{
    $sptPeneliti = SptPeneliti::with('dataTender')->findOrFail($id);
    return view('admin.spt_penelitis.show', compact('sptPeneliti'));
}


    public function edit($id)
    {
        $sptPeneliti = SptPeneliti::findOrFail($id);
        $dataTenders = DataTender::all();
        return view('admin.spt_penelitis.edit', compact('sptPeneliti', 'dataTenders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kd_tender' => 'required|exists:data_tenders,id',
            'nomor_spt' => 'required|unique:spt_penelitis,nomor_spt,' . $id,
            'tahun' => 'required|digits:4',
            'kepala_balai' => 'required',
            'nip' => 'required|digits:18',
            'jabatan' => 'required',
            'tanggal_spt' => 'required|date',
            'anggota_peneliti' => 'required',
            'keterangan' => 'nullable',
        ]);

        $sptPeneliti = SptPeneliti::findOrFail($id);
        $sptPeneliti->update($request->all());

        Alert::success('Success', 'SPT Peneliti has been updated successfully!');
        return redirect()->route('admin.spt_penelitis.index');
    }

    public function exportPDF($id)
    {
        $sptPeneliti = SptPeneliti::findOrFail($id);

        $pdf = PDF::loadView('admin.spt_penelitis.export_pdf', compact('sptPeneliti'));

        return $pdf->download('spt_peneliti_'.$sptPeneliti->id.'.pdf');
    }

    public function destroy($id)
    {
        $sptPeneliti = SptPeneliti::findOrFail($id);
        $sptPeneliti->delete();

        Alert::success('Success', 'SPT Peneliti has been deleted successfully!');
        return redirect()->route('admin.spt_penelitis.index');
    }
}
