<?php

// app/Http/Controllers/Admin/DataTenderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTender;
use App\Models\KodePokja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class DataTenderController extends Controller
{
    public function index()
    {
        $dataTenders = DataTender::all();
        return view('admin.data_tenders.index', compact('dataTenders'));
    }

    public function create()
    {
        $kodePokjas = KodePokja::all();
        return view('admin.data_tenders.create', compact('kodePokjas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_tender' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'link_web' => 'nullable|url|max:255',
            'kode_pokja' => 'required|exists:kode_pokjas,id',
            'pagu' => 'required|numeric',
            'hps' => 'required|numeric',
            'satuan_kerja' => 'required|string|max:255',
            'ppk' => 'required|string|max:255',
            'nama_instansi' => 'required|string|max:255',
            'nilai_penawaran' => 'required|numeric',
            'tanggal_penetapan' => 'required|date',
            'nilai_kontrak' => 'required|numeric',
            'tanggal_kontrak' => 'required|date',
            'waktu_pelaksanaan' => 'required|string|max:255',
        ]);

        DataTender::create($validatedData);

        Alert::success('Success', 'Data tender berhasil disimpan.');
        return redirect()->route('admin.data_tenders.index');
    }

    public function show($id)
    {
        $dataTender = DataTender::findOrFail($id);
        return view('admin.data_tenders.show', compact('dataTender'));
    }

    public function edit($id)
    {
        $dataTender = DataTender::findOrFail($id);
        $kodePokjas = KodePokja::all();
        return view('admin.data_tenders.edit', compact('dataTender', 'kodePokjas'));
    }

    public function update(Request $request, $id)
    {
        $dataTender = DataTender::findOrFail($id);

        $validatedData = $request->validate([
            'kd_tender' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'link_web' => 'nullable|url|max:255',
            'kode_pokja' => 'required|exists:kode_pokjas,id',
            'pagu' => 'required|numeric',
            'hps' => 'required|numeric',
            'satuan_kerja' => 'required|string|max:255',
            'ppk' => 'required|string|max:255',
            'nama_instansi' => 'required|string|max:255',
            'nilai_penawaran' => 'required|numeric',
            'tanggal_penetapan' => 'required|date',
            'nilai_kontrak' => 'required|numeric',
            'tanggal_kontrak' => 'required|date',
            'waktu_pelaksanaan' => 'required|string|max:255',
        ]);

        $dataTender->update($validatedData);

        Alert::success('Success', 'Data tender berhasil diperbarui.');
        return redirect()->route('admin.data_tenders.index');
    }

    public function destroy($id)
    {
        $dataTender = DataTender::findOrFail($id);
        $dataTender->delete();

        Alert::success('Success', 'Data tender berhasil dihapus.');
        return redirect()->route('admin.data_tenders.index');
    }
}
