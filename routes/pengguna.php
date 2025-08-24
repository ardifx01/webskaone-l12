<?php

use App\Http\Controllers\Pengguna\GantiPasswordController;
use App\Http\Controllers\Pengguna\PesanController;
use App\Http\Controllers\Pengguna\ProfilPenggunaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    // PROFIL PENGGUNA
    Route::group(['prefix' => 'profilpengguna', 'as' => 'profilpengguna.'], function () {
        Route::resource('profil-pengguna', ProfilPenggunaController::class)->middleware(['check.default.password']);
        Route::post('/simpanphotoprofil', [ProfilPenggunaController::class, 'updateProfilePicture'])->name('simpanphotoprofil');
        Route::post('/simpanphotobackground', [ProfilPenggunaController::class, 'updateBackground'])->name('simpanphotobackground');

        Route::post('/simpanphotoprofilsiswa', [ProfilPenggunaController::class, 'updateProfilePictureSiswa'])->name('simpanphotoprofilsiswa');
        Route::put('/simpanorangtuasiswa', [ProfilPenggunaController::class, 'updateOrtuSiswa'])->name('simpanorangtuasiswa');

        Route::resource('password-pengguna', GantiPasswordController::class);
        Route::post('password-pengguna', [GantiPasswordController::class, 'updatePassword'])->name('update-password');
        Route::resource('pesan-pengguna', PesanController::class);
        Route::get('/chats/{id}', [PesanController::class, 'getChatMessages']);
    });
});
