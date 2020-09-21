<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaControl;
use App\Http\Controllers\DashControl;
use App\Http\Controllers\AuthControl;
use App\Http\Controllers\RegisControl;

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
    return redirect('/login');
});

Route::get('/login', [AuthControl::class, 'login'] )->name('login');
Route::post('/postlogin', [AuthControl::class, 'postlogin'] );
Route::get('/logout', [AuthControl::class, 'logout'] );

Route::get('/register', [RegisControl::class, 'regisform']);
Route::post('/regis_store', [RegisControl::class, 'regis_store']);




Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dash', [DashControl::class, 'index'] );
});



Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/siswa', [SiswaControl::class, 'index']);
    Route::post('/siswa', [SiswaControl::class, 'add']);
    Route::get('/siswa/{id}/edit', [SiswaControl::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaControl::class, 'update']);
    Route::get('/siswa/{id}/hapus', [SiswaControl::class, 'hapus']);
    Route::get('siswa/{id}/siswa_profile',[SiswaControl::class, 'siswa_profile']);
});

