<?php

// app/Console/Commands/UpdateStatusCommand.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CekDataTender;
use Carbon\Carbon;

class UpdateStatusCommand extends Command
{
    protected $signature = 'update:status';
    protected $description = 'Update the status of CekDataTender records based on dates';

    public function handle()
    {
        $cekDataTenders = CekDataTender::with('dataTender')->get();

        foreach ($cekDataTenders as $cekDataTender) {
            $this->updateStatus($cekDataTender);
        }

        $this->info('Status updated successfully.');
    }

    private function updateStatus($cekDataTender)
    {
        $dataTender = $cekDataTender->dataTender;

        // Menggunakan Carbon untuk manipulasi tanggal
        $now = Carbon::now();
        $tanggalPenetapan = Carbon::parse($dataTender->tanggal_penetapan);
        $tanggalKontrak = Carbon::parse($dataTender->tanggal_kontrak);

        // Logika untuk update status
        if ($now->greaterThanOrEqualTo($tanggalKontrak->endOfDay())) {
            $cekDataTender->status = 'SELESAI';
        } elseif ($now->greaterThanOrEqualTo($tanggalKontrak->startOfDay())) {
            $cekDataTender->status = 'DIKERJAKAN';
        } elseif ($now->greaterThanOrEqualTo($tanggalPenetapan->startOfDay())) {
            $cekDataTender->status = 'DITETAPKAN';
        }

        $cekDataTender->save();
    }
}
