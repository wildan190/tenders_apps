<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\DataTender;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::all();
        return view('admin.tenders.index', compact('tenders'));
    }

    public function create()
    { 
        $kodeTenders = DataTender::all();
        return view('admin.tenders.create', compact('kodeTenders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodeTender' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'), // Contoh: tahun harus di antara 1900 dan tahun saat ini
            'namaPaket' => 'required|string|max:255',
            'catatanTimPelaksana' => 'nullable|string', // Opsional, bisa string atau kosong
            'usulan' => 'nullable|string',
            'dataPpk' => 'nullable|string',
            'dataPokja' => 'nullable|string',
            'penawaranPeserta' => 'nullable|string',
            'penawaranPesertaApendo' => 'nullable|string',
            'beritaAcara' => 'nullable|string',
            'sppbj' => 'nullable|string',
            'data_tender_id' => 'nullable|exists:data_tenders,id', // Pastikan data_tender_id valid dan ada di tabel data_tenders
        ], [
            'tahun.integer' => 'Tahun harus berupa angka.',
            'tahun.min' => 'Tahun minimal :min.',
            'tahun.max' => 'Tahun maksimal :max.',
            'data_tender_id.exists' => 'Data Tender tidak valid.',
        ]);


        $tender = new Tender();
        $tender->fill($request->all());
        $tender->save();

        return redirect()->route('admin.tenders.index')->with('success', 'Tender berhasil ditambahkan');
    }

    public function show($id)
    {
        $tender = Tender::findOrFail($id);
        return view('admin.tenders.show', compact('tender'));
    }

    public function edit($id)
    {
        $tender = Tender::findOrFail($id);
        $dataTenders = DataTender::all();
        return view('admin.tenders.edit', compact('tender', 'dataTenders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kodeTender' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'), // Contoh: tahun harus di antara 1900 dan tahun saat ini
            'namaPaket' => 'required|string|max:255',
            'catatanTimPelaksana' => 'nullable|string', // Opsional, bisa string atau kosong
            'usulan' => 'nullable|string',
            'dataPpk' => 'nullable|string',
            'dataPokja' => 'nullable|string',
            'penawaranPeserta' => 'nullable|string',
            'penawaranPesertaApendo' => 'nullable|string',
            'beritaAcara' => 'nullable|string',
            'sppbj' => 'nullable|string',
            'data_tender_id' => 'nullable|exists:data_tenders,id', // Pastikan data_tender_id valid dan ada di tabel data_tenders
        ], [
            'tahun.integer' => 'Tahun harus berupa angka.',
            'tahun.min' => 'Tahun minimal :min.',
            'tahun.max' => 'Tahun maksimal :max.',
            'data_tender_id.exists' => 'Data Tender tidak valid.',
        ]);


        $tender = Tender::findOrFail($id);
        $tender->fill($request->all());
        $tender->save();

        return redirect()->route('admin.tenders.index')->with('success', 'Tender berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tender = Tender::findOrFail($id);
        $tender->delete();

        return redirect()->route('admin.tenders.index')->with('success', 'Tender berhasil dihapus');
    }
}
