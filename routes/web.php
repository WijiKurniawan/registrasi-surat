<?php

use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/master', function () {
    return view('master');
});

Route::get('/lihatsuratkeluar', function () {
    return view('suratkeluar.index');
});

Route::get('/buatsuratkeluar', function () {
    return view('suratkeluar.create');
});

Route::resource('suratkeluar', SuratKeluarController::class);

Route::get('/download/{file}', [SuratKeluarController::class, 'download']);

Route::get('/showsuratkeluar', function () {
    return view('suratkeluar.show');
});

Route::resource('suratmasuk', SuratMasukController::class);
