<?php

namespace App\Http\Controllers;

use App\Models\Laporan_pelanggaran;
use App\Models\User;
use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelanggaranController extends Controller
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
        $pelanggarancount = pelanggaran::count();
        $pelanggaran = pelanggaran::get();
        return view('pelanggaran.index', ['pelanggaran' => $pelanggaran, 'pelanggarancount' => $pelanggarancount, 'countNotif' => $countNotif, 'perizinanData' => $perizinanData]);
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
            'hukuman' => 'required',

        ]);
        $data = $request->except('_token', '_method', 'id');

        pelanggaran::where('id', $request->id)->update($data);

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
        $laporan = Laporan_pelanggaran::where('id_pelanggaran',$id)->first();
        if($laporan){
            return redirect('/pelanggaran')->with('danger', ' Data sudah digunakan, tidak dapat dihapus');
        }else{
            pelanggaran::where('id',$id)->delete();
            return redirect('/pelanggaran')->with('success', ' Data berhasil dihapus');
        }
    }
}
