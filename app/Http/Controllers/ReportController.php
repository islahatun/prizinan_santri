<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use PDF;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(){

        $santri = Santri::get();
        return view('report.index', ['santri' => $santri]);
    }
    public function report($id){

        $santri = Santri::find($id);
        $contents = [
            'hafalan' => Hafalan::where('santri_id',$id)->get(),
            'santri'  => $santri->nama
        ];

        $pdf = PDF::loadView('report.report', $contents);

return $pdf->stream('Report--'.$santri->nama.'.pdf');
    }
}
