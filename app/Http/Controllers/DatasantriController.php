<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\models\Santri;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DatasantriController extends Controller
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

        $santricount = Santri::count();
        $santri = Santri::with('perizinan','user')->get();
        $user   = User::where('role_id',3)->get();
        return view('datasantri.index', ['santri' => $santri, 'santricount' => $santricount,'user'=>$user,'countNotif'=>$countNotif,'perizinanData'=>$perizinanData]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'orang_tua' => 'required',
            'no_telepon' => 'required',
            'status' => 'required',
        ]);

        $santri = new Santri;

        $santri->nisn = $request->input('nisn');
        $santri->nama = $request->input('nama');
        $santri->jenis_kelamin = $request->input('jenis_kelamin');
        $santri->tgl_lahir = $request->input('tgl_lahir');
        $santri->tempat_lahir = $request->input('tempat_lahir');
        $santri->alamat = $request->input('alamat');
        $santri->kelas = $request->input('kelas');
        $santri->orang_tua = $request->input('orang_tua');
        $santri->no_telepon = $request->input('no_telepon');
        $santri->status = $request->input('status');

        $santri->save();
        return redirect('/datasantri')->with('success', ' Data Berhasil Disimpan ');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'orang_tua' => 'required',
            'no_telepon' => 'required',
            'status' => 'required',
        ]);
        $santri = Santri::find($request->input('id'));
        $santri->nisn = $request->input('nisn');
        $santri->nama = $request->input('nama');
        $santri->jenis_kelamin = $request->input('jenis_kelamin');
        $santri->tgl_lahir = $request->input('tgl_lahir');
        $santri->tempat_lahir = $request->input('tempat_lahir');
        $santri->alamat = $request->input('alamat');
        $santri->kelas = $request->input('kelas');
        $santri->orang_tua = $request->input('orang_tua');
        $santri->no_telepon = $request->input('no_telepon');
        $santri->status = $request->input('status');

        $santri->update();
        return redirect('/datasantri')->with('success', ' Data Berhasil DiPerbaharui ');
    }
}
