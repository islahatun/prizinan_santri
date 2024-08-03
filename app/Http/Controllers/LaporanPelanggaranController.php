<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laporan_pelanggaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LaporanPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $pelanggarancount = Laporan_pelanggaran::count();
        $user = User::all();
        $santri = Santri::all();
        $mpelanggaran = pelanggaran::all();
        $pelanggaran = Laporan_pelanggaran::get();
        return view('pelanggaran.PelanggaranSantri', ['pelanggaran' => $pelanggaran, 'mpelanggaran' => $mpelanggaran, 'santri' => $santri, 'user' => $user, 'pelanggarancount' => $pelanggarancount, 'countNotif' => $countNotif, 'perizinanData' => $perizinanData]);
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
            Laporan_pelanggaran::create($request->all());

            DB::commit();
            Session::flash('message', 'perizinan berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('/pelanggaranSantri');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan_pelanggaran  $laporan_pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan_pelanggaran $laporan_pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan_pelanggaran  $laporan_pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan_pelanggaran $laporan_pelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan_pelanggaran  $laporan_pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id_pelanggaran' => 'required',
            'tanggal' => 'required',
            'id_santri' => 'required',
            'keterangan' => 'required',

        ]);
        $data = $request->except('_token', '_method', 'id');

        Laporan_pelanggaran::where('id', $request->id)->update($data);

        return redirect('/pelanggaranSantri')->with('success', ' Data Berhasil DiPerbaharui ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan_pelanggaran  $laporan_pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan_pelanggaran $laporan_pelanggaran)
    {
        //
    }
}
