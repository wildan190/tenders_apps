<?php

// app/Http/Controllers/Admin/DataSuratKeputusanController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSuratKeputusan;
use App\Models\DataTender;
use App\Models\CekPersonil;
use App\Models\KodePokja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataSuratKeputusanController extends Controller
{
    public function index()
    {
        $dataSuratKeputusans = DataSuratKeputusan::with('dataTender', 'cekPersonil', 'kodePokja')->paginate(10);
        return view('admin.data_surat_keputusans.index', compact('dataSuratKeputusans'));
    }

    public function create()
    {
        $dataTenders = DataTender::all();
        $cekPersonils = CekPersonil::all();
        $kodePokjas = KodePokja::all();
        return view('admin.data_surat_keputusans.create', compact('dataTenders', 'cekPersonils', 'kodePokjas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_tender_id' => 'required|exists:data_tenders,id',
            'cek_personil_id' => 'required|exists:cek_personils,id',
            'kode_pokja_id' => 'required|exists:kode_pokjas,id',
            'nomor_sk' => 'required|integer',
            'tahun' => 'required|integer',
            'nama_pembuat_komitmen' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'satuan_kerja' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'nama_personil' => 'required|string|max:255',
            'nip_personil' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'pagu' => 'required|numeric',
        ]);

        DataSuratKeputusan::create($validatedData);

        Alert::success('Success', 'Data Surat Keputusan added successfully!');

        return redirect()->route('admin.data_surat_keputusans.index');
    }

    public function show(DataSuratKeputusan $dataSuratKeputusan)
    {
        return view('admin.data_surat_keputusans.show', compact('dataSuratKeputusan'));
    }

    public function edit(DataSuratKeputusan $dataSuratKeputusan)
    {
        $dataTenders = DataTender::all();
        $cekPersonils = CekPersonil::all();
        $kodePokjas = KodePokja::all();
        return view('admin.data_surat_keputusans.edit', compact('dataSuratKeputusan', 'dataTenders', 'cekPersonils', 'kodePokjas'));
    }

    public function update(Request $request, DataSuratKeputusan $dataSuratKeputusan)
    {
        $validatedData = $request->validate([
            'data_tender_id' => 'required|exists:data_tenders,id',
            'cek_personil_id' => 'required|exists:cek_personils,id',
            'kode_pokja_id' => 'required|exists:kode_pokjas,id',
            'nomor_sk' => 'required|integer',
            'tahun' => 'required|integer',
            'nama_pembuat_komitmen' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'satuan_kerja' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'nama_personil' => 'required|string|max:255',
            'nip_personil' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'pagu' => 'required|numeric',
        ]);

        $dataSuratKeputusan->update($validatedData);

        Alert::success('Success', 'Data Surat Keputusan updated successfully!');

        return redirect()->route('admin.data_surat_keputusans.index');
    }

    public function destroy(DataSuratKeputusan $dataSuratKeputusan)
    {
        $dataSuratKeputusan->delete();

        Alert::success('Success', 'Data Surat Keputusan deleted successfully!');

        return redirect()->route('admin.data_surat_keputusans.index');
    }
}
