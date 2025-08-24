<?php

use App\Http\Controllers\HomeController; //dashboard
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Pengguna\ProfilPenggunaController;
use App\Http\Controllers\AppSupport\MenuController;
use App\Http\Controllers\AppSupport\AppFiturController;
use App\Http\Controllers\AppSupport\AppProfilController;
use App\Http\Controllers\AppSupport\BackupDbController;
use App\Http\Controllers\AppSupport\DataLoginController;
use App\Http\Controllers\AppSupport\EksporDataMasterController;
use App\Http\Controllers\AppSupport\ImporDataMasterController;
use App\Http\Controllers\AppSupport\ReferensiController;
use App\Http\Controllers\ManajemenPengguna\AksesRoleController;
use App\Http\Controllers\ManajemenPengguna\AksesUserController;
use App\Http\Controllers\ManajemenPengguna\PermissionController;
use App\Http\Controllers\ManajemenPengguna\RoleController;
use App\Http\Controllers\ManajemenPengguna\UserController;
use App\Http\Controllers\Pengguna\GantiPasswordController;
use App\Http\Controllers\Pengguna\PesanController;
use App\Http\Controllers\WebSite\PollingController;
use App\Http\Controllers\WelcomeController;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// penanganan error
Route::get('/db-error', function () {
    return view('error.auth-500');
})->name('db.error');

// penanganan error 404 jika tidak ditemukan
Route::fallback(function () {
    return response()->view('error.auth-404-basic', [], 404);
});

// sedang perbaikan
Route::get('/sedang-perbaikan', function () {
    return view('error.sedang-perbaikan');
})->name('sedangperbaikan');


//pertama kali masuk
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


// masuk halaman dashboard
Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware([
        'auth',
        'verified',
        'check.default.password',
        \App\Http\Middleware\CheckMaintenanceLogin::class
    ])
    ->name('dashboard');


// menampilkan user yang sedang aktif dan real time statistik di halaman dashboar
Route::get('/dashboard/active-users', [HomeController::class, 'fetchActiveUsers'])->name('dashboard.active-users');
Route::get('/real-time-stats', function () {
    // Hitung pengguna aktif
    $activeUsersCount = User::whereNotNull('last_login_at')
        ->where('last_login_at', '>=', now()->subMinutes(59))
        ->count();

    // Hitung login hari ini
    $loginTodayCount = LoginRecord::whereDate('login_at', now()->toDateString())->count();

    // Hitung total login
    $loginCount = DB::table('users')->sum('login_count');

    return response()->json([
        'activeUsersCount' => $activeUsersCount,
        'loginTodayCount' => $loginTodayCount,
        'loginCount' => $loginCount,
    ]);
});

// MELAKUKAN PERINTAH PHP ARTISAN OPTIMIZE:CLEAR
Route::middleware(['auth', 'master'])->get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success-chache', 'Cache sukses dibersihkan!');
})->name('clear.cache');

// SWITCH ACCOUNT
Route::middleware(['auth', 'adminOrMaster'])->post('/switch-account', [UserController::class, 'switchAccount'])->name('switch.account');

// Rute untuk kembali ke akun asal
Route::middleware(['auth'])->get('/return-account', [UserController::class, 'returnToOriginalAccount'])->name('return.account');

// ABOUT
Route::get('about', [AboutController::class, 'index'])->name('about.index');

// MELAKUKAN POLLING SUBMIT
Route::middleware(['auth'])->post('/websiteapp/pollingsubmit', [PollingController::class, 'submitPolling'])->name('websiteapp.pollingsubmit');

// Kelompok rute untuk profil, hanya dapat diakses oleh pengguna yang sudah terotentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Language Translation
    Route::get('lang/switch/{lang}', function ($lang) {
        Session::put('lang', $lang);
        return redirect()->back();
    })->name('lang.switch');
});


// Rute otentikasi yang dihasilkan oleh Laravel Breeze
require __DIR__ . '/auth.php';
require __DIR__ . '/manajemenpengguna.php';
require __DIR__ . '/pengguna.php';
require __DIR__ . '/appsupport.php';
require __DIR__ . '/template.php';
require __DIR__ . '/manajemensekolah.php';
require __DIR__ . '/kurikulum.php';
require __DIR__ . '/gurumapel.php';
require __DIR__ . '/walikelas.php';
require __DIR__ . '/pesertadidik.php';
require __DIR__ . '/excel.php';
require __DIR__ . '/prakerin.php';
require __DIR__ . '/wakasek.php';
require __DIR__ . '/kaprodi.php';
require __DIR__ . '/bpbk.php';
require __DIR__ . '/ketatausahaan.php';
require __DIR__ . '/skaonewelcome.php';
require __DIR__ . '/alumni.php';
require __DIR__ . '/websiteapp.php';
require __DIR__ . '/guruwali.php';

// Rute fallback untuk `auth`, menangani view dalam folder `auth`
Route::get('auth/{page}', function ($page) {
    if (view()->exists("auth.$page")) {
        return view("auth.$page");
    }
    abort(404);
})->name('auth');

//Route::get('{any}', [HomeController::class, 'index'])->where('any', '.*')->name('index');
