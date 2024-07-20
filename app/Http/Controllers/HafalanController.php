<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Santri;
use App\Models\surah;
use App\Models\Ustad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hafalan = Hafalan::get();
        $santri = Santri::get();
        $surah  = surah::get();
        $ustadz = Ustad::get();
        $count = Hafalan::count();
        return view('hafalan.index', ['hafalan' => $hafalan,'hafalancount'=>$count,'ustadz' => $ustadz,'santri' => $santri,'surah' => $surah]);
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
        // dd($request->all());

            try {
                DB::beginTransaction();
                Hafalan::create($request->all());

                DB::commit();
                Session::flash('message', 'perizinan berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('/hafalan');
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
            }

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
            'nisn' => 'required',
            'surat_id' => 'required',
            'tanggal' => 'required',
            'nilai' => 'required',
            'tajwid' => 'required',
            'makhroj' => 'required',
            'ustadz_id' => 'required',

        ]);
        $data = $request->except('_token','_method','id');

        Hafalan::where('id',$request->id)->update($data);

        return redirect('/hafalan')->with('success', ' Data Berhasil DiPerbaharui ');
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
