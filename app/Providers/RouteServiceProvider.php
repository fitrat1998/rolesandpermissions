<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Default home route.
     *
     * @var string
     */
    public const HOME = '/index';

    /**
     * Register route bindings and other configuration.
     */
    public function boot(): void
    {
        // API rate limiting
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Route registration
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Foydalanuvchini roliga qarab yo'naltirish.
     */

    public static function getDynamicHome(): string
    {
        if (!Auth::check()) {
            Log::info('Foydalanuvchi autentifikatsiyadan o\'tmagan.');
            return '/login';
        }

        $user = Auth::user();
        Log::info('Foydalanuvchi:', ['user' => $user]);

        if ($user->hasRole('super admin')) {
            return '/super-admin';
        } elseif ($user->hasRole('admin')) {
            return '/admin';
        }

        return self::HOME; // Default: /dashboard
    }


}
