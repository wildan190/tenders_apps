<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodePokja;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\KodePokjaTemplateExport;
use App\Imports\KodePokjaImport;
use Illuminate\Support\Facades\Cache;

class KodePokjaController extends Controller
{
    public function index()
    {
        $kodePokjas = Cache::remember('kode_pokjas', 600, function () {
            return KodePokja::latest()->paginate(10);
        });

        return view('admin.kode_pokjas.index', compact('kodePokjas'));
    }

    public function create()
    {
        return view('admin.kode_pokjas.create');
    }

    public function show($id)
    {
        $kodePokja = KodePokja::findOrFail($id);
        return view('admin.kode_pokjas.show', compact('kodePokja'));
    }

    public function exportTemplate()
    {
        return Excel::download(new KodePokjaTemplateExport, 'kodepokja_template.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        KodePokja::create($request->all());

        Alert::success('Success', 'Data Kode Pokja berhasil ditambahkan.');

        return redirect()->route('admin.kode_pokjas.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'importFile' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('importFile');

        try {
            Excel::import(new KodePokjaImport, $file);
            Alert::success('Success', 'Data Kode Pokja berhasil diimport.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengimport data Pokja.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $kodePokja = KodePokja::findOrFail($id);
        return view('admin.kode_pokjas.edit', compact('kodePokja'));
    }

    public function update(Request $request, KodePokja $kodePokja)
    {
        $request->validate($this->validationRules($kodePokja->id));

        $kodePokja->update($request->all());

        Alert::success('Success', 'Data Kode Pokja berhasil diperbarui.');

        return redirect()->route('admin.kode_pokjas.index');
    }

    public function destroy($id)
    {
        $kodePokja = KodePokja::findOrFail($id);
        $kodePokja->delete();

        Alert::success('Success', 'Data Kode Pokja berhasil dihapus.');

        Cache::forget('kode_pokjas');

        return redirect()->route('admin.kode_pokjas.index');
    }

    protected function validationRules($id = null)
    {
        $rules = [
            'kode_pokja' => 'required|unique:kode_pokjas,kode_pokja',
            'keterangan' => 'required',
        ];

        if ($id !== null) {
            $rules['kode_pokja'] .= ',' . $id;
        }

        return $rules;
    }
}
