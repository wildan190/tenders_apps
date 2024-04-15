<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgendaRapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\AgendaCreated;
use PDF;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\ValidationRuleParser;

class AgendaRapatController extends Controller
{
    public function index()
    {
        $agendaRapat = AgendaRapat::paginate(10);
        return view('admin.agenda.index', compact('agendaRapat'));
    }

    public function create()
    {
        return view('admin.agenda.create');
        // Gantilah 'admin.agenda.create' dengan nama view yang sesuai dengan struktur folder dan file view Anda.
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $agendaRapat = AgendaRapat::create($request->all());

        Mail::to($request->email_peserta)->send(new AgendaCreated($agendaRapat));

        Alert::success('Success', 'Agenda berhasil ditambahkan.');

        return redirect()->route('admin.agenda.index');
    }


    public function show($id)
    {
        $agendaRapat = AgendaRapat::findOrFail($id);
        return view('admin.agenda.show', compact('agendaRapat'));
    }

    public function edit($id)
    {
        $agendaRapat = AgendaRapat::findOrFail($id);
        return view('admin.agenda.edit', compact('agendaRapat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules($id));

        $agendaRapat = AgendaRapat::findOrFail($id);
        $agendaRapat->update($request->all());

        Alert::success('Success', 'Agenda berhasil diperbarui.');

        return redirect()->route('admin.agenda.index');
    }


    public function destroy($id)
    {
        $agendaRapat = AgendaRapat::findOrFail($id);
        $agendaRapat->delete();

        Alert::success('Success', 'Agenda berhasil dihapus.')->persistent(true, false);

        return redirect()->route('admin.agenda.index');
    }

    public function printPdf($id)
    {
        $agendaRapat = AgendaRapat::findOrFail($id);

        $pdf = PDF::loadView('admin.agenda.show-pdf', compact('agendaRapat'));

        return $pdf->download('agenda_rapat_' . $id . '.pdf');
    }

    protected function validationRules($id = null)
    {
        $rules = [
            'email_peserta' => 'required|email|unique:agenda_rapats,email_peserta,' . $id,
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',
        ];

        return $rules;
    }
}
