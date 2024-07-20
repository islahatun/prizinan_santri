<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Santri;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\Models\Laporan_pelanggaran;

class LaporanPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggarancount = Perizinan::where('keterangan', '=', 'Tidak Tepat Waktu')->count();
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::get();
        return view('pelanggaran.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'pelanggarancount' => $pelanggarancount,]);
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
    public function update(Request $request, Laporan_pelanggaran $laporan_pelanggaran)
    {
        //
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
