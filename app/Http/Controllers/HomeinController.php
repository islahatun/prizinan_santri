<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ustad;
use App\Models\Santri;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeinController extends Controller
{
    public function index()
    {

        if(Auth::user()->role_id == 3){
            $count = Perizinan::whereNotNull('keterangan')->where('user_id',Auth::user()->id)->count();
            $countNotif = $count? $count:0;
            $perizinanData = Perizinan::whereNotNull('keterangan')->where('user_id',Auth::user()->id)->get();
        }else{
            $count = Perizinan::whereNull('keterangan')->count();
            $countNotif = $count? $count:0;
            $perizinanData = Perizinan::whereNull('keterangan')->get();
        }

        $ustadcount = Ustad::count();
        $santricount = Santri::count();
        $perizinancount = Perizinan::count();
        $pelanggarancount = Perizinan::where('keterangan', '=', 'Tidak Tepat Waktu')->count();
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::all();
        return view('homein.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'santricount' => $santricount, 'perizinancount' => $perizinancount, 'pelanggarancount' => $pelanggarancount, 'ustadcount' => $ustadcount,'countNotif'=>$countNotif,'perizinanData'=>$perizinanData]);
    }
}
