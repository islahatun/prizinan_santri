<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\models\Angka;
use App\Models\Perizinan;
use App\models\User;
use App\models\Santri;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------- ----------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return dd(Santri::find(1)->first()->perizinan[0]->alasan_izin);
    return view('home');
});

Route::get('/home-in', [App\Http\Controllers\HomeinController::class, 'index'])->name('homeIn');

Route::get('/datasantri', [App\Http\Controllers\DatasantriController::class, 'index'])->name('dataSantri');
Route::post('/datasantri-add', [App\Http\Controllers\DatasantriController::class, 'store'])->name('dataSantri-add');
Route::put('/datasantri-edit', [App\Http\Controllers\DatasantriController::class, 'update'])->name('dataSantri-edit');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile-add', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile-add');
Route::put('/profile-edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile-edit');

Route::get('/dataAdmin', [App\Http\Controllers\AdminController::class, 'index'])->name('dataAdmin');
Route::post('/dataAdmin-add', [App\Http\Controllers\AdminController::class, 'store'])->name('dataAdmin-add');
Route::put('/dataAdmin-edit', [App\Http\Controllers\AdminController::class, 'update'])->name('dataAdmin-edit');

Route::get('/dataustad', [\App\Http\Controllers\DataustadController::class, 'index'])->name('dataUstad');
Route::post('/dataustad-add', [\App\Http\Controllers\DataustadController::class, 'store'])->name('dataUstad-add');
Route::put('/dataustad-edit', [\App\Http\Controllers\DataustadController::class, 'update'])->name('dataUstad-edit');


Route::get('/perizinan', [\App\Http\Controllers\PerizinanController::class, 'index'])->name('perizinan');
Route::post('/perizinan-add', [\App\Http\Controllers\PerizinanController::class, 'store'])->name('perizinan-add');

Route::get('/pelaporan', [\App\Http\Controllers\PerizinanController::class, 'pelaporanview'])->name('pelaporan');
Route::post('/pelaporan-add', [\App\Http\Controllers\PerizinanController::class, 'storepelaporan'])->name('pelaporan-add');
Route::get('/pelaporan-download/{id}', [\App\Http\Controllers\PerizinanController::class, 'download'])->name('pelaporan-download');

Route::get('/pelanggaran', [\App\Http\Controllers\PelanggaranController::class, 'index'])->name('pelanggaran');
Route::post('/pelanggaran-add', [\App\Http\Controllers\PelanggaranController::class, 'store'])->name('pelanggaranAdd');
Route::put('/pelanggaran-update', [\App\Http\Controllers\PelanggaranController::class, 'update'])->name('pelanggaranUpdate');

Route::get('/pelanggaranSantri', [\App\Http\Controllers\LaporanPelanggaranController::class, 'index'])->name('pelanggaranSantri');
Route::post('/pelanggaranSantri-add', [\App\Http\Controllers\LaporanPelanggaranController::class, 'store'])->name('pelanggaranSantriAdd');
Route::put('/pelanggaranSantri-update', [\App\Http\Controllers\LaporanPelanggaranController::class, 'update'])->name('pelanggaranSantriUpdate');

Route::get('/hafalan', [\App\Http\Controllers\HafalanController::class, 'index'])->name('hafalan');
Route::post('/hafalan-add', [\App\Http\Controllers\HafalanController::class, 'store'])->name('hafalanAdd');
Route::put('/hafalan-update', [\App\Http\Controllers\HafalanController::class, 'update'])->name('hafalanUpdate');

Route::get('/perilaku', [\App\Http\Controllers\PerilakuController::class, 'index'])->name('perilaku');
Route::post('/perilaku-add', [\App\Http\Controllers\PerilakuController::class, 'store'])->name('perilakuAdd');
Route::put('/perilaku-update', [\App\Http\Controllers\PerilakuController::class, 'update'])->name('perilakuUpdate');

Route::get('/report', [\App\Http\Controllers\ReportController::class, 'index'])->name('report');
Route::get('/report-data/{id}', [\App\Http\Controllers\ReportController::class, 'report'])->name('reportData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prilaku', [App\Http\Controllers\ReportController::class, 'index'])->name('prilaku');
