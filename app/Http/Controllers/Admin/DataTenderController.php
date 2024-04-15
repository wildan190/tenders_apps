<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTender;
use App\Models\KodePokja;
use App\Models\Pokja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataTenderController extends Controller
{
    public function index()
    {
        $dataTenders = DataTender::with('kodePokja')->paginate(10);
        return view('admin.data_tenders.index', compact('dataTenders'));
    }

    public function create()
    {
        $kodePokjas = KodePokja::all();
        $pokjas = Pokja::all();
        return view('admin.data_tenders.create', compact('kodePokjas', 'pokjas'));
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
            'waktu_pelaksanaan' => 'required|string',
            'tahun' => 'required|string|max:255',
            'pokja_id' => 'required|array',
        ]);

        $dataTender = DataTender::create($validatedData);
        $dataTender->pokjas()->attach($request->input('pokja_id'));

        Alert::success('Success', 'Data tender berhasil disimpan.');
        return redirect()->route('admin.data_tenders.index');
    }

    public function getMembers(Request $request)
    {
        $pokjaId = $request->input('pokja_id');
        $pokja = Pokja::find($pokjaId);

        if (!$pokja) {
            return response()->json(['error' => 'Pokja not found'], 404);
        }

        $members = $pokja->anggota->pluck('nama', 'id');
        return response()->json($members);
    }

    public function show($id)
    {
        $dataTender = DataTender::findOrFail($id);
        $pokjas = Pokja::all();
        return view('admin.data_tenders.show', compact('dataTender', 'pokjas'));
    }

    public function edit($id)
    {
        $dataTender = DataTender::findOrFail($id);
        $kodePokjas = KodePokja::all();
        $pokjas = Pokja::all();
        return view('admin.data_tenders.edit', compact('dataTender', 'kodePokjas', 'pokjas'));
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
            'waktu_pelaksanaan' => 'required|date',
            'tahun' => 'required|string|max:255',
            'pokja_id' => 'required|exists:pokjas,id',
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
