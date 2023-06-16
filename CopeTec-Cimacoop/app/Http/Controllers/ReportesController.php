<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;

class ReportesController extends Controller
{
    public function index()
    {
        $pdf = \App::make('snappy.pdf');
        //return view("welcome");
        $pdf = PDF::loadView('reportes.test.index');
        //return view("Reportes.informeclientediario",compact('reporte'));
        return $pdf->setOrientation('landscape')->inline();
    }
}
