<?php

namespace App\Exports;

use App\Models\Credito;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CreditScoreExport implements FromView
{
   
    public function view(): View
    {
        return view('contabilidad.reportes.infored_rep', [
            'creditos' => Credito::all()
        ]);
    }
}
