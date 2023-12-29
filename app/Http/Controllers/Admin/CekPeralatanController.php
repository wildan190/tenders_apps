<?php

// app/Http/Controllers/Admin/CekPeralatanController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CekPeralatan;
use App\Models\KodePokja;
use App\Models\DataTender;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class CekPeralatanController extends Controller
{
    public function index()
    {
        $cekPeralatans = CekPeralatan::paginate(5);
        return view('admin.cek_peralatans.index', compact('cekPeralatans'));
    }

    public function create()
    {
        $kodePokjas = KodePokja::all();
        $dataTenders = DataTender::all();
        return view('admin.cek_peralatans.create', compact('kodePokjas', 'dataTenders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_pokja' => 'required|exists:kode_pokjas,id',
            'nama_paket' => 'required|string|max:255',
            'tahun_anggaran' => 'required|string|max:255',
            'pemenang' => 'required|string|max:255',
            'spmk' => 'required|date',
            'spmk_selesai' => 'required|date', // Tambahkan ini
            'peralatan_syarat' => 'required|string|max:255',
            'peralatan_ditawarkan' => 'required|string|max:255',
        ]);

        CekPeralatan::create($validatedData);

        Alert::success('Success', 'Data cek peralatan berhasil disimpan.');
        return redirect()->route('admin.cek_peralatans.index');
    }

    public function show($id)
    {
        $cekPeralatan = CekPeralatan::findOrFail($id);
        $dataTender = $cekPeralatan->dataTender; // Pastikan hubungan model telah didefinisikan dengan benar

        return view('admin.cek_peralatans.show', compact('cekPeralatan', 'dataTender'));
    }

    public function edit($id)
    {
        $cekPeralatan = CekPeralatan::findOrFail($id);
        $kodePokjas = KodePokja::all();
        $dataTenders = DataTender::all();
        return view('admin.cek_peralatans.edit', compact('cekPeralatan', 'kodePokjas', 'dataTenders'));
    }

    public function update(Request $request, $id)
    {
        $cekPeralatan = CekPeralatan::findOrFail($id);

        $request->validate([
            'kode_pokja' => 'required|exists:kode_pokjas,id',
            'nama_paket' => 'required|string|max:255',
            'tahun_anggaran' => 'required|string|max:255',
            'pemenang' => 'required|string|max:255',
            'spmk' => 'required|string|max:255',
            'spmk_selesai' => 'required|string|max:255',
            'peralatan_syarat' => 'required|string|max:255',
            'peralatan_ditawarkan' => 'required|string|max:255',
        ]);

        $cekPeralatan->update($request->all());

        Alert::success('Success', 'Data cek peralatan berhasil diperbarui.');
        return redirect()->route('admin.cek_peralatans.index');
    }

    public function destroy($id)
    {
        $cekPeralatan = CekPeralatan::findOrFail($id);
        $cekPeralatan->delete();

        Alert::success('Success', 'Data cek peralatan berhasil dihapus.');
        return redirect()->route('admin.cek_peralatans.index');
    }
}
