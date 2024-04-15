<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PokjaImport;
use App\Exports\PokjaTemplateExport;
use App\Models\Pokja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PokjaController extends Controller
{
    public function index()
    {
        $pokjas = Pokja::paginate(10);
        return view('admin.pokjas.index', compact('pokjas'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $pokjas = Pokja::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                      ->orWhere('nik', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);

        if ($pokjas->isEmpty()) {
            Alert::info('Info', 'Data tidak ditemukan.');
        }

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

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'importFile' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'File yang diunggah harus berformat Excel (xlsx/xls).');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('importFile');

        try {
            Excel::import(new PokjaImport, $file);
            Alert::success('Success', 'Data Pokja berhasil diimport.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengimport data Pokja.');
        }

        return redirect()->back();
    }

    protected function validateRequest(Request $request, $id = null)
    {
        return $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'nik' => 'required|unique:pokjas,nik,' . $id,
            'email' => 'required|email|unique:pokjas,email,' . $id,
            'telepon' => 'required',
        ], [
            'nik.unique' => 'NIK sudah digunakan.',
            'email.unique' => 'Email sudah digunakan.',
        ]);
    }
}
