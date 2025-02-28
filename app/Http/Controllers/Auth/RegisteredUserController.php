<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $cnt = User::count();
        $role_cnt = Role::count();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
        ]);

        // Agar birinchi foydalanuvchi bo'lsa, "Super Admin" va "user" rollarini tayinlash
        if ($cnt === 0) {

            if ($role_cnt === 0) {
                Role::create([
                    'name' => 'Super Admin',
                    'title' => 'Super Admin',
                    'guard_name' => 'web'
                ]);
            }

            $user->assignRole('Super Admin');
        }

        // "user" roli mavjud bo'lmasa, uni yaratish
        if (!Role::where('name', 'user')->exists()) {
            Role::create([
                'name' => 'user',
                'title' => 'User',
                'guard_name' => 'web'
            ]);
        }

        // Har bir foydalanuvchiga "user" rolini berish
        $user->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
