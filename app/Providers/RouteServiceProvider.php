<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/app/console/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $this->appRoutes();
            
            $this->coreRoutes();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(4)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    private function appRoutes()
    {
        Route::middleware(['web'])
            ->prefix('app/auth')
            ->name('admin:auth:')
            ->namespace($this->namespace)
            ->group(base_path('routes/app_auth.php'));

        Route::middleware(['web', 'auth'])
            ->prefix('app/console')
            ->name('admin:')
            ->namespace($this->namespace)
            ->group(base_path('routes/app_routes.php'));
    }

    private function coreRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->prefix('app/console/finance')
            ->name('app:')
            ->namespace($this->namespace)
            ->group(base_path('routes/app_core.php'));
    }
}
