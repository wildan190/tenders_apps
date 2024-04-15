<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PokjaImport;
use App\Models\Pokja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PokjaTemplateExport;
use Illuminate\Database\Eloquent\Builder;

class PokjaController extends Controller
{
    public function index()
    {
        $pokjas = Cache::remember('pokjas', now()->addMinutes(10), function () {
            return Pokja::paginate(10);
        });

        return view('admin.pokjas.index', compact('pokjas'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $pokjas = Cache::remember('search-' . $keyword, now()->addMinutes(5), function () use ($keyword) {
            return Pokja::when($keyword, function (Builder $query) use ($keyword) {
                return $query->where('nama', 'like', '%' . $keyword . '%')
                             ->orWhere('nik', 'like', '%' . $keyword . '%');
            })->paginate(10);
        });

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
        Cache::forget('pokjas'); // Hapus cache 'pokjas'
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
        Cache::forget('pokjas'); // Hapus cache 'pokjas'
        Alert::success('Success', 'Data Pokja berhasil diperbarui.')->persistent(true, true);
        return redirect()->route('admin.pokjas.index');
    }

    public function destroy($id)
    {
        $pokja = Pokja::findOrFail($id);
        $pokja->delete();
        Cache::forget('pokjas'); // Hapus cache 'pokjas'
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
        $request->validate([
            'importFile' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('importFile');

        try {
            Excel::import(new PokjaImport, $file);

            Cache::forget('pokjas'); // Hapus cache 'pokjas'

            Alert::success('Success', 'Data Pokja berhasil diimport.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengimport data Pokja.');
        }

        return redirect()->back();
    }

    protected function validateRequest(Request $request, $id = null)
    {
        $idCondition = $id ? ',' . $id : '';

        $rules = [
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'nik' => 'required|unique:pokjas,nik' . $idCondition,
            'email' => 'required|email|unique:pokjas,email' . $idCondition,
            'telepon' => 'required',
        ];

        $messages = [
            'nik.unique' => 'NIK sudah digunakan.',
            'email.unique' => 'Email sudah digunakan.',
        ];

        return $request->validate($rules, $messages);
    }
}

