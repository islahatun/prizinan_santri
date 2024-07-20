<?php

namespace App\Http\Controllers;

use App\Models\Ustad;
use App\Models\User;
use Illuminate\Http\Request;

class DataustadController extends Controller
{
    public function index()
    {
        $ustadcount = Ustad::count();
        $user = User::all();
        $ustad = Ustad::get();
        return view('dataustad.index', ['ustad' => $ustad, 'user' => $user, 'ustadcount' => $ustadcount,]);
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
        "password" => $request->input('password'),
        ];

        User::where('ustad_id',$request->id)->update($data);

        return redirect('/dataustad')->with('success', ' Data Berhasil Disimpan ');
    }
}
