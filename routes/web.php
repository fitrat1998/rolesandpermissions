<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('lang/{locale}', [LocaleController::class, 'changeLocale'])->name('changeLocale');

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->hasRole('super admin')) {
            return redirect('/super-admin');
        } elseif ($user->hasRole('admin')) {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    return redirect('/login');
})->name('index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('permissions', PermissionController::class);
    Route::post('roles/{id}/give-permission', [RoleController::class, 'givePermission'])->name('roles.givePermission');
    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);

    Route::resource('users', UserController::class);

    Route::middleware('role:super admin')->get('/super-admin', function () {
        return view('adminsuper.index');
    })->name('adminsuper.index');

    Route::middleware('role:admin')->get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
