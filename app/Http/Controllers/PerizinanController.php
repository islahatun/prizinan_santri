<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Santri;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;


class PerizinanController extends Controller
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

            $perizinan = Perizinan::whereHas('santri', function ($query) {
                $query->where('orang_tua', Auth::user()->id);
            })->get();
            $santri = Santri::where('orang_tua', Auth::user()->id)->get();
        } else {
            $count = Perizinan::whereNull('keterangan')->count();
            $countNotif = $count ? $count : 0;
            $perizinanData = Perizinan::whereNull('keterangan')->get();
            $perizinan = Perizinan::get();
            $santri = Santri::all();
        }
        $perizinancount = Perizinan::count();
        $user = User::whereNotNull('ustad_id')->get();

        $alasanIzin = [
            [
                'alasan' => "Acara Pondok",
            ],
            [
                'alasan' => "Acara Keluarga",
            ],
            [
                'alasan' => "Sakit",
            ],
            [
                'alasan' => "Lainnya",
            ]
        ];

        return view('perizinan.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'perizinancount' => $perizinancount, 'countNotif' => $countNotif, 'perizinanData' => $perizinanData, 'alasanIzin' => $alasanIzin]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $santri = Santri::findOrFail($request->santri_id)->only('status');
        if ($santri['status'] != 'bpulang') {
            Session::flash('message', 'tidak bisa pulang karena sedang dalam perizinan');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/perizinan');
        } else {
            try {
                DB::beginTransaction();
                Perizinan::create($request->all());

                $santri = Santri::findOrFail($request->santri_id);
                $santri->status = 'tbpulang';
                $santri->save();
                DB::commit();
                Session::flash('message', 'perizinan berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('/perizinan');
            } catch (\Throwable $th) {
                DB::rollBack();
                // dd($th);
            }
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token', '_method', 'id');
        $santri = Santri::findOrFail($request->santri_id)->only('status');
        // if ($santri['status'] != 'bpulang') {
        //     Session::flash('message', 'tidak bisa pulang karena sedang dalam perizinan');
        //     Session::flash('alert-class', 'alert-danger');
        //     return redirect('/perizinan');
        // } else {
        try {
            DB::beginTransaction();
            Perizinan::where('id', $request->id)->update($data);

            $santri = Santri::findOrFail($request->santri_id);
            $santri->status = 'tbpulang';
            $santri->save();
            DB::commit();
            Session::flash('message', 'perizinan berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('/perizinan');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
        // }
    }

    public function pelaporanview()
    {
        if (Auth::user()->role_id == 3) {
            $count = Perizinan::whereNotNull('keterangan')->where('user_id', Auth::user()->id)->count();
            $countNotif = $count ? $count : 0;
            $perizinanData = Perizinan::whereNotNull('keterangan')->where('user_id', Auth::user()->id)->get();
        } else {
            $count = Perizinan::whereNull('keterangan')->count();
            $countNotif = $count ? $count : 0;
            $perizinanData = Perizinan::whereNull('keterangan')->get();
        }
        $santricount = Santri::count();
        $perizinancount = Perizinan::count();
        $pelanggarancount = Perizinan::where('keterangan', '=', 'Ditolak')->count();
        $user = User::whereNotNull('ustad_id')->get();
        $santri = Santri::all();
        $perizinan = Perizinan::get();
        return view('pelaporan.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'santricount' => $santricount, 'perizinancount' => $perizinancount, 'pelanggarancount' => $pelanggarancount, 'countNotif' => $countNotif, 'perizinanData' => $perizinanData]);
    }

    public function storepelaporan(Request $request)
    {
        // dd($request->all());
        $izin = Perizinan::where('id', $request->perizinan_id)->where('actual_tgl_balik', '=', null);
        $izindata = $izin->first();
        $izincount = $izin->count();
        // dd($izincount);

        if ($izincount == 1) {
            $santri = Santri::findOrFail($izindata->santri_id)->only('status');
            // if ($santri['status'] != 'tbpulang') {
            //     Session::flash('message', 'tidak bisa melakukan pelaporan karena kesalahan data');
            //     Session::flash('alert-class', 'alert-danger');
            //     return redirect('/pelaporan');
            // } else {
            try {
                if ($request->user_id == null || $request->user_id == '') {
                    $user_id = Auth::user()->id;
                } else {
                    $user_id = $request->user_id;
                }
                DB::beginTransaction();
                $izindata->actual_tgl_balik = $request->input('actual_tgl_balik');
                $izindata->keterangan = $request->input('keterangan');
                $izindata->user_id = $user_id;
                $izindata->save();

                $santri = Santri::findOrFail($izindata->santri_id);
                $santri->status = 'bpulang';
                $santri->save();
                DB::commit();
                Session::flash('message', 'pelaporan berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('/pelaporan');
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
            }
        }
        // } else {
        //     Session::flash('message', 'tidak bisa melakukan pelaporan karena kesalahan data');
        //     Session::flash('alert-class', 'alert-danger');
        //     return redirect('/pelaporan');
        // }
    }

    public function download($id)
    {
        $perizinan = Perizinan::with('santri', 'user')->find($id);
        $content = [
            'data' => $perizinan
        ];


        $pdf = PDF::loadView('report.formulir', $content);

        return $pdf->stream('formulir--' . $perizinan->santri->nama . '.pdf');
    }

    public function destroy($id)
    {
        $perizinan = Perizinan::where('id', $id)->delete();
        if ($perizinan) {
            Session::flash('message', 'perizinan berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('/perizinan');
        } else {
            Session::flash('message', 'perizinan gagal diapus');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/perizinan');
        }
    }
}
