<?php

use App\Http\Controllers\Admin\AgendaRapatController;
use App\Http\Controllers\Admin\CekDataTenderController;
use App\Http\Controllers\Admin\CekPeralatanController;
use App\Http\Controllers\Admin\CekPersonilController;
use App\Http\Controllers\Admin\DataSuratKeputusanController;
use App\Http\Controllers\Admin\DataTenderController;
use App\Http\Controllers\Admin\KodePokjaController;
use App\Http\Controllers\Admin\PokjaController;
use App\Http\Controllers\Admin\SuratPenyampaianController;
use App\Http\Controllers\Admin\SptPenelitiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute untuk dashboard
Route::get('/', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rute yang membutuhkan otorisasi admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Pengelompokan rute Agenda Rapat
    Route::resource('admin/agenda', AgendaRapatController::class);
    Route::get('admin/agenda/{id}/print', [AgendaRapatController::class, 'printPdf'])
        ->name('admin.agenda.print');

    // Pengelompokan rute Pokja
    Route::resource('admin/pokjas', PokjaController::class);
    Route::get('pokjas/export-template', [PokjaController::class, 'exportTemplate'])
        ->name('admin.pokjas.export-template');
    Route::post('admin/pokjas/import', [PokjaController::class, 'import'])
        ->name('admin.pokjas.import');
    Route::get('pokjas/search', [PokjaController::class, 'search'])
        ->name('admin.pokjas.search');

    // Pengelompokan rute Kode Pokja
    Route::resource('admin/kode_pokjas', KodePokjaController::class);
    Route::get('kode_pokjas/export-template', [KodePokjaController::class, 'exportTemplate'])
        ->name('admin.kode_pokjas.export-template');
    Route::post('admin/kode_pokjas/import', [KodePokjaController::class, 'import'])
        ->name('admin.kode_pokjas.import');

    // Pengelompokan rute Cek Personil
    Route::resource('admin/cek_personils', CekPersonilController::class);
    Route::post('admin/pokjas/get-members', [PokjaController::class, 'getMembers'])
        ->name('admin.pokjas.get-members');

    // Pengelompokan rute Data Tender
    Route::resource('admin/data_tenders', DataTenderController::class);

    // Pengelompokan rute Cek Data Tender
    Route::resource('admin/cek_data_tenders', CekDataTenderController::class);
    Route::get('cek_data_tenders/search', [CekDataTenderController::class, 'search'])
        ->name('admin.cek_data_tenders.search');
    Route::post('admin/cek_data_tenders/update-status-all', [CekDataTenderController::class, 'updateStatusAll'])
        ->name('admin.cek_data_tenders.updateStatusAll');

    // Pengelompokan rute Cek Peralatan
    Route::resource('admin/cek_peralatans', CekPeralatanController::class);

    // Pengelompokan rute Data Surat Keputusan
    Route::resource('admin/data_surat_keputusans', DataSuratKeputusanController::class);
    Route::get('admin/data_surat_keputusans/{id}/export_pdf', [DataSuratKeputusanController::class, 'exportPDF'])
        ->name('admin.data_surat_keputusans.export_pdf');

    // Pengelompokan rute Spt Peneliti
    Route::resource('admin/spt_penelitis', SptPenelitiController::class);
    Route::get('admin/spt_penelitis/{id}/export_pdf', [SptPenelitiController::class, 'exportPDF'])
        ->name('admin.spt_penelitis.export_pdf');

    // Pengelompokan rute Surat Penyampaian
    Route::resource('admin/surat_penyampaians', SuratPenyampaianController::class);
    Route::get('admin/surat_penyampaians/{id}/export_pdf', [SuratPenyampaianController::class, 'exportPDF'])
        ->name('admin.surat_penyampaians.export_pdf');
});

// Rute profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute autentikasi
require __DIR__ . '/auth.php';
