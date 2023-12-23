<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaRapatController;
use App\Http\Controllers\Admin\KodePokjaController;
use App\Http\Controllers\Admin\PokjaController;
use App\Http\Controllers\Admin\CekPersonilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



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

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
