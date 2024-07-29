<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $user   = User::find(Auth::user()->id);
        return view('profile.index', ['user'=>$user,'countNotif'=>$countNotif,'perizinanData'=>$perizinanData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = $request->except('_token','_method','id');
        $data['password'] = Hash::make($request->password) ;
       User::where('id',$request->id)->update($data);

        return redirect('/profile')->with('success', ' Data Berhasil DiPerbaharui ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
