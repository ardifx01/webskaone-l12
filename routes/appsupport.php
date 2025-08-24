<?php

use App\Http\Controllers\AppSupport\AppFiturController;
use App\Http\Controllers\AppSupport\AppProfilController;
use App\Http\Controllers\AppSupport\BackupDbController;
use App\Http\Controllers\AppSupport\DataLoginController;
use App\Http\Controllers\AppSupport\EksporDataMasterController;
use App\Http\Controllers\AppSupport\ImporDataMasterController;
use App\Http\Controllers\AppSupport\MenuController;
use App\Http\Controllers\AppSupport\ReferensiController;
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
    // APP SUPPORT
    Route::group(['prefix' => 'appsupport', 'as' => 'appsupport.'], function () {
        Route::put('menu/sort', [MenuController::class, 'sort'])->name('menu.sort');
        Route::resource('menu', MenuController::class);

        Route::resource('app-fiturs', AppFiturController::class);
        Route::put('app-fiturs/{id}/simpan-status', [AppFiturController::class, 'simpanStatus'])->name('app-fiturs.simpan-status');

        Route::resource('app-profil', AppProfilController::class);
        Route::resource('referensi', ReferensiController::class);

        Route::resource('backup-db', BackupDbController::class);
        Route::post('/backup-db/process', [BackupDbController::class, 'backupSelectedTables'])->name('backup-db.process');
        Route::delete('/backup-db/delete/{fileName}', [BackupDbController::class, 'deleteBackupFile'])->name('backup-db.delete');

        Route::resource('impor-data-master', ImporDataMasterController::class);
        Route::resource('ekspor-data-master', EksporDataMasterController::class);

        Route::resource('data-login', DataLoginController::class);
    });
});
