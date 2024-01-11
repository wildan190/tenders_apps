<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\CekDataTender;
use Carbon\Carbon;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Pekerjaan yang dijadwalkan untuk dijalankan setiap menit
        $schedule->call(function () {
            $this->updateStatusAutomatically();
        })->everyMinute();
    }

    private function updateStatusAutomatically()
    {
        // Ambil semua data cek data tender
        $cekDataTenders = CekDataTender::all();

        foreach ($cekDataTenders as $cekDataTender) {
            $cekDataTender->updateStatus();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    protected $commands = [
        \App\Console\Commands\UpdateStatusCommand::class,
    ];
}
