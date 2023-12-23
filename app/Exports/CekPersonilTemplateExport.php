<?php

// app/Exports/CekPersonilTemplateExport.php

namespace App\Exports;

use App\Models\CekPersonil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\View as ViewFacade;

class CekPersonilTemplateExport implements FromView
{
    public function view(): View
    {
        //$pokjas = Pokja::all(); // Sesuaikan dengan model Pokja

        return ViewFacade::make('admin.cek_personils.template', compact('pokjas'));
    }
}
