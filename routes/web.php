<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login'); // Asosiy sahifaga kirganda login sahifasiga yo'naltiradi
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        if ($role == 1) {
           return view('admin.index');
        } elseif ($role == 2) {
            return view('dashboard');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');
});

require __DIR__.'/auth.php';
