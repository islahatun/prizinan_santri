<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Laporan_pelanggaran;
use App\Models\Perilaku;
use PDF;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(){

        $santri = Santri::get();
        if(Auth::user()->role_id == '3'){
            $santri = Santri::where('orang_tua',Auth::user()->id)->get();
        }
        return view('report.index', ['santri' => $santri]);
    }
    public function report($id){

        $santri = Santri::find($id);
        $perilaku = Perilaku::where('id_santri',$id)->get();
        $listPerilaku = [];
        foreach($perilaku as $p){
            $listPerilaku[] =
                [
                    'nama'  => 'Nilai Jujur',
                    'nilai' => $p->nilai_jujur,

                ];
            $listPerilaku[] = [
                'nama' => 'Nilai Rajin',
                'nilai'   => $p->nilai_rajin,

                ];
            $listPerilaku[] =[
                'nama' => 'Nilai Bersih',
                'nilai'=>$p->nilai_bersih,

                ];
            $listPerilaku[] =[
                'nama' => 'Nilai Sopan Santun',
                    'nilai'=>$p->nilai_sopan_santun,

               ];
            $listPerilaku[] = [
                'nama' => 'Nilai Istikomah',
                    'nilai'=>$p->nilai_istikomah
               ];
        };
        $contents = [
            'hafalan' => Hafalan::where('santri_id',$id)->get(),
            'pelanggaran' => Laporan_pelanggaran::where('id_santri',$id)->get(),
            'perilaku'      => $listPerilaku,
            'santri'  => $santri->nama
        ];

        $pdf = PDF::loadView('report.report', $contents);

return $pdf->stream('Report--'.$santri->nama.'.pdf');
    }
}
