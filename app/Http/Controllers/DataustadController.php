<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ustad;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataustadController extends Controller
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
        $user = User::all();
        $ustad = Ustad::get();
        return view('dataustad.index', ['ustad' => $ustad, 'user' => $user, 'ustadcount' => $ustadcount,'countNotif'=>$countNotif,'perizinanData'=>$perizinanData]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_telepon' => 'required',
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
        ]);

        $ustad = new Ustad();
        $ustad->nama = $request->input('nama');
        $ustad->jenis_kelamin = $request->input('jenis_kelamin');
        $ustad->tgl_lahir = $request->input('tgl_lahir');
        $ustad->tempat_lahir = $request->input('tempat_lahir');
        $ustad->alamat = $request->input('alamat');
        $ustad->jabatan = $request->input('jabatan');
        $ustad->no_telepon = $request->input('no_telepon');

        $ustad->save();

        $user = new User();
        $user->ustad_id  = $ustad->id;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = 2;
        $user->email_verified_at = $request->input('email_verified_at');
        $user->password = $request->input('password');

        $user->save();

        return redirect('/dataustad')->with('success', ' Data Berhasil Disimpan ');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_telepon' => 'required',
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
        ]);

        $ustad = Ustad::find($request->input('id'));
        $ustad->nama = $request->input('nama');
        $ustad->jenis_kelamin = $request->input('jenis_kelamin');
        $ustad->tgl_lahir = $request->input('tgl_lahir');
        $ustad->tempat_lahir = $request->input('tempat_lahir');
        $ustad->alamat = $request->input('alamat');
        $ustad->jabatan = $request->input('jabatan');
        $ustad->no_telepon = $request->input('no_telepon');

        $ustad->save();

        $data = [
            "name" => $request->input('name'),
        "email" => $request->input('email'),
        "email_verified_at" => $request->input('email_verified_at'),
        "password" => Hash::make($request->input('password')),
        ];

        User::where('ustad_id',$request->id)->update($data);

        return redirect('/dataustad')->with('success', ' Data Berhasil Disimpan ');
    }
}
