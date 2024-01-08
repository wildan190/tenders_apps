<?php

// app/Http/Controllers/Admin/CekPersonilController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CekPersonil;
use App\Models\Pokja;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CekPersonilController extends Controller
{
    public function index()
    {
        $pokjas = Pokja::all();
        $cekPersonils = CekPersonil::all();
        return view('admin.cek_personils.index', compact('cekPersonils', 'pokjas'));
    }

    public function create()
    {
        $pokjas = Pokja::all();
        return view('admin.cek_personils.create', compact('pokjas'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        // Validasi setiap entri formulir
        foreach ($requestData['nama_personil'] as $key => $namaPersonil) {
            $validatedData = Validator::make([
                'nama_personil' => $namaPersonil,
                'jabatan_personil' => $requestData['jabatan_personil'][$key],
                'nik_personil' => $requestData['nik_personil'][$key],
                'npwp_personil' => $requestData['npwp_personil'][$key],
                'email_personil' => $requestData['email_personil'][$key],
                'telepon_personil' => $requestData['telepon_personil'][$key],
            ], [
                'nama_personil' => 'required|string|max:255',
                'jabatan_personil' => 'required|string|max:255',
                'nik_personil' => 'required|string|max:255',
                'npwp_personil' => 'required|string|max:255',
                'email_personil' => 'required|email|max:255',
                'telepon_personil' => 'required|string|max:255',
            ])->validate();

            // Simpan setiap entri formulir
            CekPersonil::create($validatedData);
        }

        Alert::success('Success', 'Data cek personil berhasil disimpan.');
        return redirect()->route('admin.cek_personils.index');
    }





    public function show($id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);
        //$pokjas = Pokja::all();
        return view('admin.cek_personils.show', compact('cekPersonil'));
    }

    public function edit($id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);
        //$pokjas = Pokja::all();
        return view('admin.cek_personils.edit', compact('cekPersonil'));
    }

    public function update(Request $request, $id)
    {
        $cekPersonil = CekPersonil::findOrFail($id);

        $request->validate([
            'nama_personil' => 'required',
            'jabatan_personil' => 'required',
            //'golongan_personil' => 'required',
            'nik_personil' => [
                'required',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'npwp_personil' => [
                'required',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'email_personil' => [
                'required',
                'email',
                Rule::unique('cek_personils')->ignore($cekPersonil->id),
            ],
            'telepon_personil' => 'required',
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
