<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class PokjaTemplateExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('admin.pokjas.template');
    }
}
