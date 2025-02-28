<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Foydalanuvchi ruxsatiga tekshiradi.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validaya qoidalari.
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'], // Login kiritish talab qilinadi
            'password' => ['required', 'string'], // Parol kiritish talab qilinadi
        ];
    }

    /**
     * Autentifikatsiya jarayoni.
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = [
            'login' => $this->input('login'), // Login - 'name' maydoniga moslanadi
            'password' => $this->input('password'),
        ];

        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => trans('auth.failed'), // Xatolikni login maydoniga chiqaradi
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Rate limitni tekshirish (xatolikni oldini olish).
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Throttle kaliti yaratish.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('login')) . '|' . $this->ip());
    }
}
