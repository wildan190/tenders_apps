<?php

// app/Exports/kodePokjaTemplateExport.php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class KodePokjaTemplateExport implements FromView
{
    public function view(): View
    {
        return view('admin.kode_pokjas.template');
    }
}