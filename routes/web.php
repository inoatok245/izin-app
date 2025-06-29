<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Karyawan\IzinController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard karyawan (bukan untuk admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'karyawan'])->name('dashboard');

// Profile (bisa untuk semua user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Fitur untuk karyawan
Route::middleware(['auth', 'karyawan'])->group(function () {
    Route::get('/pengajuan-izin', [IzinController::class, 'create'])->name('izin.create');
    Route::post('/pengajuan-izin', [IzinController::class, 'store'])->name('izin.store');
    Route::get('/riwayat-izin', [IzinController::class, 'index'])->name('izin.index');
});

// Redirect setelah login sesuai role
Route::get('/redirect-login', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin');
    }

    return redirect()->route('izin.index');
})->middleware('auth');

// Route auth dari Breeze / Laravel UI
require __DIR__.'/auth.php';
