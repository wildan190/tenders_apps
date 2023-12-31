<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaRapatController;
use App\Http\Controllers\Admin\KodePokjaController;
use App\Http\Controllers\Admin\PokjaController;
use App\Http\Controllers\Admin\CekPersonilController;
use App\Http\Controllers\Admin\DataTenderController;
use App\Http\Controllers\Admin\CekDataTenderController;
use App\Http\Controllers\Admin\CekPeralatanController;
use App\Http\Controllers\Admin\DataSuratKeputusanController;
use App\Http\Controllers\Admin\SptPenelitiController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Rute untuk Agenda Rapat
    Route::get('/admin/agenda', [AgendaRapatController::class, 'index'])->name('admin.agenda.index');
    Route::get('/admin/agenda/create', [AgendaRapatController::class, 'create'])->name('admin.agenda.create');
    Route::post('/admin/agenda', [AgendaRapatController::class, 'store'])->name('admin.agenda.store');
    Route::get('/admin/agenda/{id}', [AgendaRapatController::class, 'show'])->name('admin.agenda.show');
    Route::get('/admin/agenda/{id}/edit', [AgendaRapatController::class, 'edit'])->name('admin.agenda.edit');
    Route::put('/admin/agenda/{id}', [AgendaRapatController::class, 'update'])->name('admin.agenda.update');
    Route::delete('/admin/agenda/{id}', [AgendaRapatController::class, 'destroy'])->name('admin.agenda.destroy');

    //print
    Route::get('/admin/agenda/{id}/print', [AgendaRapatController::class, 'printPdf'])->name('admin.agenda.print');

    //Pokja
    Route::get('/admin/pokjas', [PokjaController::class, 'index'])->name('admin.pokjas.index');
    Route::get('/admin/pokjas/create', [PokjaController::class, 'create'])->name('admin.pokjas.create');
    Route::post('/admin/pokjas', [PokjaController::class, 'store'])->name('admin.pokjas.store');
    Route::get('/admin/pokjas/{id}', [PokjaController::class, 'show'])->name('admin.pokjas.show');
    Route::get('/admin/pokjas/{id}/edit', [PokjaController::class, 'edit'])->name('admin.pokjas.edit');
    Route::put('/admin/pokjas/{id}', [PokjaController::class, 'update'])->name('admin.pokjas.update');
    Route::delete('/admin/pokjas/{id}', [PokjaController::class, 'destroy'])->name('admin.pokjas.destroy');
    //expor impor
    Route::get('/pokjas/export-template', [PokjaController::class, 'exportTemplate'])->name('admin.pokjas.export-template');
    Route::post('admin/pokjas/import', [PokjaController::class, 'import'])->name('admin.pokjas.import');

    // Rute untuk Kode Pokja
    Route::get('/admin/kode_pokjas', [KodePokjaController::class, 'index'])->name('admin.kode_pokjas.index');
    Route::get('/admin/kode_pokjas/create', [KodePokjaController::class, 'create'])->name('admin.kode_pokjas.create');
    Route::post('/admin/kode_pokjas', [KodePokjaController::class, 'store'])->name('admin.kode_pokjas.store');
    Route::get('/admin/kode_pokjas/{id}', [KodePokjaController::class, 'show'])->name('admin.kode_pokjas.show');
    Route::get('/admin/kode_pokjas/{id}/edit', [KodePokjaController::class, 'edit'])->name('admin.kode_pokjas.edit');
    Route::put('/admin/kode_pokjas/{id}', [KodePokjaController::class, 'update'])->name('admin.kode_pokjas.update');
    Route::delete('/admin/kode_pokjas/{id}', [KodePokjaController::class, 'destroy'])->name('admin.kode_pokjas.destroy');
    Route::get('/kode_pokjas/export-template', [KodePokjaController::class, 'exportTemplate'])->name('admin.kode_pokjas.export-template');
    Route::post('/admin/kode_pokjas/import', [KodePokjaController::class, 'import'])->name('admin.kode_pokjas.import');

    // Rute untuk Cek Personil
    Route::get('/admin/cek_personils', [CekPersonilController::class, 'index'])->name('admin.cek_personils.index');
    Route::get('/admin/cek_personils/create', [CekPersonilController::class, 'create'])->name('admin.cek_personils.create');
    Route::post('/admin/cek_personils', [CekPersonilController::class, 'store'])->name('admin.cek_personils.store');
    Route::get('/admin/cek_personils/{cekPersonil}', [CekPersonilController::class, 'show'])->name('admin.cek_personils.show');
    Route::get('/admin/cek_personils/{cekPersonil}/edit', [CekPersonilController::class, 'edit'])->name('admin.cek_personils.edit');
    Route::put('/admin/cek_personils/{cekPersonil}', [CekPersonilController::class, 'update'])->name('admin.cek_personils.update');
    Route::delete('/admin/cek_personils/{cekPersonil}', [CekPersonilController::class, 'destroy'])->name('admin.cek_personils.destroy');
    Route::post('/admin/pokjas/get-members', [PokjaController::class, 'getMembers'])->name('admin.pokjas.get-members');

    // Rute untuk Data Tender
    Route::get('/admin/data_tenders', [DataTenderController::class, 'index'])->name('admin.data_tenders.index');
    Route::get('/admin/data_tenders/create', [DataTenderController::class, 'create'])->name('admin.data_tenders.create');
    Route::post('/admin/data_tenders', [DataTenderController::class, 'store'])->name('admin.data_tenders.store');
    Route::get('/admin/data_tenders/{id}', [DataTenderController::class, 'show'])->name('admin.data_tenders.show');
    Route::get('/admin/data_tenders/{id}/edit', [DataTenderController::class, 'edit'])->name('admin.data_tenders.edit');
    Route::put('/admin/data_tenders/{id}', [DataTenderController::class, 'update'])->name('admin.data_tenders.update');
    Route::delete('/admin/data_tenders/{id}', [DataTenderController::class, 'destroy'])->name('admin.data_tenders.destroy');

    // Rute untuk Cek Data Tender
    Route::get('/admin/cek_data_tenders', [CekDataTenderController::class, 'index'])->name('admin.cek_data_tenders.index');
    Route::get('/admin/cek_data_tenders/create', [CekDataTenderController::class, 'create'])->name('admin.cek_data_tenders.create');
    Route::post('/admin/cek_data_tenders', [CekDataTenderController::class, 'store'])->name('admin.cek_data_tenders.store');
    Route::get('/admin/cek_data_tenders/{id}', [CekDataTenderController::class, 'show'])->name('admin.cek_data_tenders.show');
    Route::get('/admin/cek_data_tenders/{id}/edit', [CekDataTenderController::class, 'edit'])->name('admin.cek_data_tenders.edit');
    Route::put('/admin/cek_data_tenders/{id}', [CekDataTenderController::class, 'update'])->name('admin.cek_data_tenders.update');
    Route::delete('/admin/cek_data_tenders/{id}', [CekDataTenderController::class, 'destroy'])->name('admin.cek_data_tenders.destroy');

    // Rute untuk Cek Peralatan
    Route::get('/admin/cek_peralatans', [CekPeralatanController::class, 'index'])->name('admin.cek_peralatans.index');
    Route::get('/admin/cek_peralatans/create', [CekPeralatanController::class, 'create'])->name('admin.cek_peralatans.create');
    Route::post('/admin/cek_peralatans', [CekPeralatanController::class, 'store'])->name('admin.cek_peralatans.store');
    Route::get('/admin/cek_peralatans/{id}', [CekPeralatanController::class, 'show'])->name('admin.cek_peralatans.show');
    Route::get('/admin/cek_peralatans/{id}/edit', [CekPeralatanController::class, 'edit'])->name('admin.cek_peralatans.edit');
    Route::put('/admin/cek_peralatans/{id}', [CekPeralatanController::class, 'update'])->name('admin.cek_peralatans.update');
    Route::delete('/admin/cek_peralatans/{id}', [CekPeralatanController::class, 'destroy'])->name('admin.cek_peralatans.destroy');

    // Rute untuk Data Surat Keputusan
    Route::get('/admin/data_surat_keputusans', [DataSuratKeputusanController::class, 'index'])->name('admin.data_surat_keputusans.index');
    Route::get('/admin/data_surat_keputusans/create', [DataSuratKeputusanController::class, 'create'])->name('admin.data_surat_keputusans.create');
    Route::post('/admin/data_surat_keputusans', [DataSuratKeputusanController::class, 'store'])->name('admin.data_surat_keputusans.store');
    Route::get('/admin/data_surat_keputusans/{dataSuratKeputusan}', [DataSuratKeputusanController::class, 'show'])->name('admin.data_surat_keputusans.show');
    Route::get('/admin/data_surat_keputusans/{dataSuratKeputusan}/edit', [DataSuratKeputusanController::class, 'edit'])->name('admin.data_surat_keputusans.edit');
    Route::put('/admin/data_surat_keputusans/{dataSuratKeputusan}', [DataSuratKeputusanController::class, 'update'])->name('admin.data_surat_keputusans.update');
    Route::delete('/admin/data_surat_keputusans/{dataSuratKeputusan}', [DataSuratKeputusanController::class, 'destroy'])->name('admin.data_surat_keputusans.destroy');
    Route::get('/admin/data_surat_keputusans/{id}/export_pdf', [DataSuratKeputusanController::class, 'exportPDF'])->name('admin.data_surat_keputusans.export_pdf');

    // Rute untuk Spt Peneliti
    Route::get('/admin/spt_penelitis', [SptPenelitiController::class, 'index'])->name('admin.spt_penelitis.index');
    Route::get('/admin/spt_penelitis/create', [SptPenelitiController::class, 'create'])->name('admin.spt_penelitis.create');
    Route::post('/admin/spt_penelitis', [SptPenelitiController::class, 'store'])->name('admin.spt_penelitis.store');
    Route::get('/admin/spt_penelitis/{id}', [SptPenelitiController::class, 'show'])->name('admin.spt_penelitis.show');
    Route::get('/admin/spt_penelitis/{id}/edit', [SptPenelitiController::class, 'edit'])->name('admin.spt_penelitis.edit');
    Route::put('/admin/spt_penelitis/{id}', [SptPenelitiController::class, 'update'])->name('admin.spt_penelitis.update');
    Route::delete('/admin/spt_penelitis/{id}', [SptPenelitiController::class, 'destroy'])->name('admin.spt_penelitis.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';