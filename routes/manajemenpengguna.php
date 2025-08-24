<?php

use App\Http\Controllers\ManajemenPengguna\AksesRoleController;
use App\Http\Controllers\ManajemenPengguna\AksesUserController;
use App\Http\Controllers\ManajemenPengguna\PermissionController;
use App\Http\Controllers\ManajemenPengguna\RoleController;
use App\Http\Controllers\ManajemenPengguna\UserController;
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
    // MANAJEMEN PENGGUNA
    Route::group(['prefix' => 'manajemenpengguna', 'as' => 'manajemenpengguna.'], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('akses-role/{role}/role', [AksesRoleController::class, 'getPermissionsByRole']);
        Route::resource('akses-role', AksesRoleController::class)->except(['create', 'store', 'delete'])->parameters(['akses-role' => 'role']);

        Route::get('akses-user/{user}/user', [AksesUserController::class, 'getPermissionsByUser']);
        Route::resource('akses-user', AksesUserController::class)->except(['create', 'store', 'delete'])->parameters(['akses-user' => 'user']);

        Route::resource('users', UserController::class);
        Route::post('/users/{user}/add-role', [UserController::class, 'addRole'])->name('users.addRole');
        Route::post('/users/reset-password/{id}', [UserController::class, 'directResetPassword'])->name('users.directResetPassword');
        Route::delete('/hapus-role-massal', [UserController::class, 'hapusRoleMassalAjax'])->name('hapus.role.ajax');
        Route::post('/generate-permission', [PermissionController::class, 'generatePermission'])->name('generatepermission');
        Route::post('/assign-role', [UserController::class, 'assignRole'])->name('assignRole');
    });
});
