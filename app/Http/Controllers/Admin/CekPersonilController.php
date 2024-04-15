<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CekPersonil;
use App\Models\Pokja;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CekPersonilController extends Controller
{
    public function index()
    {
        $pokjas = Pokja::all();
        $cekPersonils = CekPersonil::paginate(10);
        return view('admin.cek_personils.index', compact('cekPersonils', 'pokjas'));
    }

    public function create()
    {
        $pokjas = Pokja::all();
        return view('admin.cek_personils.create', compact('pokjas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_personil.*' => 'required|string|max:255',
            'jabatan_personil.*' => 'required|string|max:255',
            'nik_personil.*' => 'required|string|max:255|unique:cek_personils,nik_personil',
            'npwp_personil.*' => 'required|string|max:255|unique:cek_personils,npwp_personil',
            'email_personil.*' => 'required|email|max:255|unique:cek_personils,email_personil',
            'telepon_personil.*' => 'required|string|max:255',
        ]);

        foreach ($request->nama_personil as $key => $namaPersonil) {
            CekPersonil::create([
                'nama_personil' => $namaPersonil,
                'jabatan_personil' => $request->jabatan_personil[$key],
                'nik_personil' => $request->nik_personil[$key],
                'npwp_personil' => $request->npwp_personil[$key],
                'email_personil' => $request->email_personil[$key],
                'telepon_personil' => $request->telepon_personil[$key],
            ]);
        }

        Alert::success('Success', 'Data cek personil berhasil disimpan.');
        return redirect()->route('admin.cek_personils.index');
    }

    public function show($id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);
        return view('admin.cek_personils.show', compact('cekPersonil'));
    }

    public function edit($id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);
        return view('admin.cek_personils.edit', compact('cekPersonil'));
    }

    public function update(Request $request, $id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);

        $request->validate([
            'nama_personil' => 'required|string|max:255',
            'jabatan_personil' => 'required|string|max:255',
            'nik_personil' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'npwp_personil' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'email_personil' => [
                'required',
                'email',
                'max:255',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'telepon_personil' => 'required|string|max:255',
        ]);

        $cekPersonil->update($request->all());

        Alert::success('Success', 'Data personil berhasil diperbarui.');
        return redirect()->route('admin.cek_personils.index');
    }

    public function destroy($id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);
        $cekPersonil->delete();

        Alert::success('Success', 'Data personil berhasil dihapus.');
        return redirect()->route('admin.cek_personils.index');
    }
}
