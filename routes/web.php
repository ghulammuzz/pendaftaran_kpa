<?php

use App\Http\Controllers\CreateDataController;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kongres_form', function () {
    return view('kongres_form');
});

Route::get('/workshop_form', function () {
    return view('workshop_form');
});

// Route::get('/seminar_form', function () {
//     return view('seminar_form');
// });

Route::get('/seminar_form', function () {
    return view('form_seminar');
});

Route::get('/pameran_form', function () {
    return view('pameran_form');
});

Route::get('/pertunjukan_form', function () {
    return view('pertunjukan_form');
});

Route::get('/kemah_form', function () {
    return view('kemah_form');
});


//Menampilkan Informasi Pendaftar
Route::get('/informasi_pendaftar', [CreateDataController::class, 'showInformasi'])->name('informasi_pendaftaran');
Route::get('/dashboard', [CreateDataController::class, 'showDashboard'])->name('dashboard');

//Menampilkan detail peserta
Route::get('/detail_kongres', [CreateDataController::class, 'detailKongres'])->name('detail_kongres');
Route::get('/detail_seminar', [CreateDataController::class, 'detailSeminar'])->name('detail_seminar');
Route::get('/detail_pameran', [CreateDataController::class, 'detailPameran'])->name('detail_pameran');
Route::get('/detail_pertunjukan', [CreateDataController::class, 'detailPertunjukan'])->name('detail_pertunjukan');
Route::get('/detail_workshop', [CreateDataController::class, 'detailWorkshop'])->name('detail_workshop');
Route::get('/detail_kemah', [CreateDataController::class, 'detailKemah'])->name('detail_kemah');

//Post Pendaftaran
Route::post('/pendaftaran-kongres', [CreateDataController::class, 'storeKongres'])->name('pendaftaran.kongres.store');
// Route::post('/pendaftaran-seminar', [CreateDataController::class, 'storeSeminar'])->name('pendaftaran.seminar.store');
Route::post('/pendaftaran-seminar', [CreateDataController::class, 'seminarStore'])->name('pendaftaran.seminar.store');
Route::post('/pendaftaran-pameran', [CreateDataController::class, 'storePameran'])->name('pendaftaran.pameran.store');
Route::post('/pendaftaran-pertunjukan', [CreateDataController::class, 'storePertunjukan'])->name('pendaftaran.pertunjukan.store');
Route::post('/pendaftaran-workshop', [CreateDataController::class, 'storeWorkshop'])->name('pendaftaran.workshop.store');
Route::post('/pendaftaran-kemah', [CreateDataController::class, 'storeKemah'])->name('pendaftaran.kemah.store');

//Cetak Bukti
Route::get('/cetak-bukti/{kongres}', [CreateDataController::class, 'cetakBukti'])->name('cetak.bukti');
Route::get('/download/{folder}/{filename}', [CreateDataController::class, 'downloadFile'])->name('downloadFile');

//Chart
Route::get('/seminar/chart-data-seminar', [CreateDataController::class, 'getDataForChartSeminar']);
Route::get('/pameran/chart-data-pameran', [CreateDataController::class, 'getDataForChartPameran']);
Route::get('/kemah/chart-data-kemah', [CreateDataController::class, 'getDataForChartKemah']);
Route::get('/pertunjukan/chart-data-pertunjukan', [CreateDataController::class, 'getDataForChartPertunjukan']);
Route::get('/workshop/chart-data-workshop', [CreateDataController::class, 'getDataForChartWorkshop']);





