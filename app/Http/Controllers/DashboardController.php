<?php

namespace App\Http\Controllers;

use App\Models\Pokja;
use App\Models\DataTender;
use App\Models\CekDataTender;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data Pokja
        $totalPokja = Pokja::count();

        // Mengambil jumlah data tender
        $totalTender = DataTender::count();

        // Mengambil data tender yang ditetapkan, dikerjakan, dan selesai
        $tenderDitetapkan = CekDataTender::where('status', 'DITETAPKAN')->count();
        $tenderDikerjakan = CekDataTender::where('status', 'DIKERJAKAN')->count();
        $tenderSelesai = CekDataTender::where('status', 'SELESAI')->count();

        // Contoh lain: mengambil data tender yang akan berlangsung dalam 7 hari ke depan
        $upcomingTenders = DataTender::whereDate('tanggal_penetapan', '>=', now())
            ->whereDate('tanggal_penetapan', '<=', now()->addDays(7))
            ->orderBy('tanggal_penetapan')
            ->get();

        // Mengirimkan data ke halaman dashboard.blade.php
        return view('dashboard', compact('totalPokja', 'totalTender', 'tenderDitetapkan', 'tenderDikerjakan', 'tenderSelesai', 'upcomingTenders'));
    }
}
