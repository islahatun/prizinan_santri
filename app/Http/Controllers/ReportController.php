<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Santri;
use App\Models\Hafalan;
use App\Models\Perilaku;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\Models\Laporan_pelanggaran;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {

        if (Auth::user()->role_id == 3) {
            $count = Perizinan::whereNotNull('keterangan')->whereHas('santri', function ($query) {
                $query->where('orang_tua', Auth::user()->id);
            })->count();

            $countNotif = $count ? $count : 0;
            $perizinanData = Perizinan::whereNotNull('keterangan')->whereHas('santri', function ($query) {
                $query->where('orang_tua', Auth::user()->id);
            })->get();

            $perizinan = Perizinan::whereNotNull('keterangan')->whereHas('santri', function ($query) {
                $query->where('orang_tua', Auth::user()->id);
            })->get();
        } else {
            $count = Perizinan::whereNull('keterangan')->count();
            $countNotif = $count ? $count : 0;
            $perizinanData = Perizinan::whereNull('keterangan')->get();
            $perizinan = Perizinan::get();
        }

        $santri = Santri::get();
        if (Auth::user()->role_id == '3') {
            $santri = Santri::where('orang_tua', Auth::user()->id)->get();
        }
        return view('report.index', ['santri' => $santri, 'countNotif' => $countNotif, 'perizinanData' => $perizinanData, 'perizinan' => $perizinan]);
    }
    public function report($id)
    {

        $santri = Santri::find($id);
        $perilaku = Perilaku::where('id_santri', $id)->get();
        $listPerilaku = [];
        foreach ($perilaku as $p) {
            $listPerilaku[] =
                [
                    'nama'  => 'Nilai Jujur',
                    'nilai' => $p->nilai_jujur,

                ];
            $listPerilaku[] = [
                'nama' => 'Nilai Rajin',
                'nilai'   => $p->nilai_rajin,

            ];
            $listPerilaku[] = [
                'nama' => 'Nilai Bersih',
                'nilai' => $p->nilai_bersih,

            ];
            $listPerilaku[] = [
                'nama' => 'Nilai Sopan Santun',
                'nilai' => $p->nilai_sopan_santun,

            ];
            $listPerilaku[] = [
                'nama' => 'Nilai Istikomah',
                'nilai' => $p->nilai_istikomah
            ];
        };
        $contents = [
            'hafalan' => Hafalan::where('santri_id', $id)->get(),
            'pelanggaran' => Laporan_pelanggaran::where('id_santri', $id)->get(),
            'perilaku'      => $listPerilaku,
            'santri'  => $santri->nama
        ];

        $pdf = PDF::loadView('report.report', $contents);

        return $pdf->stream('Report--' . $santri->nama . '.pdf');
    }
}
