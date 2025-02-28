<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/index', function () {
    // Agar foydalanuvchi tizimga kirgan bo'lsa
    if (Auth::check()) {
        $user = Auth::user();

        // Foydalanuvchi roliga qarab yo'naltirish
        if ($user->hasRole('super admin')) {
            return redirect('/super-admin');
        } elseif ($user->hasRole('admin')) {
            return redirect('/admin');
        }

        // Oddiy foydalanuvchi uchun
        return redirect('/dashboard');
    }

    // Agar foydalanuvchi tizimga kirgan bo'lmasa
    return redirect('/login');
})->name('index');

// Auth'dan o'tgan foydalanuvchilar uchun yo'nalishlar
Route::middleware('auth')->group(function () {

    // Profilni tahrirlash
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Super Admin sahifasi
    Route::middleware('role:super admin')->get('/super-admin', function () {

        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        return view('admin.index');


    })->name('admin.index');

    // Admin sahifasi
    Route::middleware('role:admin')->get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Oddiy foydalanuvchi sahifasi
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
