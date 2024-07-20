<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggarancount = pelanggaran::count();
        $pelanggaran = pelanggaran::get();
        return view('pelanggaran.index', ['pelanggaran' => $pelanggaran, 'pelanggarancount' => $pelanggarancount,]);
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
                pelanggaran::create($request->all());

                DB::commit();
                Session::flash('message', 'perizinan berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('/pelanggaran');
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
            'nama_pelanggaran' => 'required',
            'skor_pelanggaran' => 'required',

        ]);
        $data = $request->except('_token','_method','id');

        pelanggaran::where('id',$request->id)->update($data);

        return redirect('/pelanggaran')->with('success', ' Data Berhasil DiPerbaharui ');
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
