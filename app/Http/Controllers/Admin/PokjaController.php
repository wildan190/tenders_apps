<?php

// app/Http/Controllers/Admin/PokjaController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PokjaImport;
use App\Models\Pokja;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PokjaTemplateExport;

class PokjaController extends Controller
{
    public function index()
    {
        $pokjas = Pokja::paginate(10);
        return view('admin.pokjas.index', compact('pokjas'));
    }

    public function create()
    {
        return view('admin.pokjas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        Pokja::create($validatedData);

        Alert::success('Success', 'Data Pokja berhasil ditambahkan.')->persistent(true, true);

        return redirect()->route('admin.pokjas.index');
    }

    public function show($id)
    {
        $pokja = Pokja::findOrFail($id);
        return view('admin.pokjas.show', compact('pokja'));
    }

    public function edit($id)
    {
        $pokja = Pokja::findOrFail($id);
        return view('admin.pokjas.edit', compact('pokja'));
    }

    public function update(Request $request, $id)
    {
        $pokja = Pokja::findOrFail($id);

        $validatedData = $this->validateRequest($request, $id);

        $pokja->update($validatedData);

        Alert::success('Success', 'Data Pokja berhasil diperbarui.')->persistent(true, true);

        return redirect()->route('admin.pokjas.index');
    }

    public function destroy($id)
    {
        $pokja = Pokja::findOrFail($id);
        $pokja->delete();

        Alert::success('Success', 'Data Pokja berhasil dihapus.')->persistent(true, true);

        return redirect()->route('admin.pokjas.index');
    }

    public function exportTemplate()
    {
        return Excel::download(new PokjaTemplateExport, 'pokja_template.xlsx');
    }

    public function importForm()
    {
        return view('admin.pokjas.import');
    }

    public function field(Request $request)
    {
        return [
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'golongan' => $request->input('golongan'),
            'nik' => $request->input('nik'),
            //'npwp' => $request->input('npwp'),
            'email' => $request->input('email'),
            'telepon' => $request->input('telepon'),
        ];
    }


    public function import(Request $request)
    {
        $request->validate([
            'importFile' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('importFile');

        try {
            Excel::import(new PokjaImport, $file);
            Alert::success('Success', 'Data Pokja berhasil diimport.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengimport data Pokja.');
            return redirect()->back();
        }
    }


    protected function validateRequest(Request $request, $id = null)
    {
        $rules = [
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'nik' => 'required|unique:pokjas,nik,' . $id,
            //'npwp' => 'required|unique:pokjas,npwp,' . $id,
            'email' => 'required|email|unique:pokjas,email,' . $id,
            'telepon' => 'required',
        ];

        $messages = [
            'nik.unique' => 'NIK sudah digunakan.',
            //'npwp.unique' => 'NPWP sudah digunakan.',
            'email.unique' => 'Email sudah digunakan.',
        ];

        return $request->validate($rules, $messages);
    }
}
