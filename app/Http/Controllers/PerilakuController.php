<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Santri;
use App\Models\Perilaku;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PerilakuController extends Controller
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
        $perilakuCount = Perilaku::count();
        $user = User::all();
        $santri = Santri::all();
        $perilaku = Perilaku::get();
        return view('perilaku.index', ['perilaku' => $perilaku,'santri' => $santri, 'user' => $user, 'perilakuCount' => $perilakuCount,'countNotif'=>$countNotif,'perizinanaData'=>$perizinanData]);
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
        try {
            DB::beginTransaction();
            Perilaku::create($request->all());

            DB::commit();
            Session::flash('message', 'perizinan berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('/perilaku');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perilaku  $perilaku
     * @return \Illuminate\Http\Response
     */
    public function show(Perilaku $perilaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perilaku  $perilaku
     * @return \Illuminate\Http\Response
     */
    public function edit(Perilaku $perilaku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perilaku  $perilaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'id_santri' => 'required',
            'nilai_jujur' => 'required',
            'nilai_rajin' => 'required',
            'nilai_bersih' => 'required',
            'nilai_sopan_santun' => 'required',
            'nilai_istikomah' => 'required',
        ]);
        $data = $request->except('_token','_method','id');

        Perilaku::where('id',$request->id)->update($data);

        return redirect('/perilaku')->with('success', ' Data Berhasil DiPerbaharui ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perilaku  $perilaku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perilaku $perilaku)
    {
        //
    }
}
