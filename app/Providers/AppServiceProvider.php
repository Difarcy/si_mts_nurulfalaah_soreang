<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\SchoolProfile;
use App\Models\VisualIdentity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        Carbon::setLocale('id');

        // Share School Profile & Visual Identity to all views
        View::composer('*', function ($view) {
            $schoolProfile = \Illuminate\Support\Facades\Cache::remember('school_profile_global', 3600, function () {
                return SchoolProfile::firstOrCreate([]);
            });

            $visualIdentity = \Illuminate\Support\Facades\Cache::remember('visual_identity_global', 3600, function () {
                return VisualIdentity::first();
            });

            $view->with('globalSchoolProfile', $schoolProfile);
            $view->with('visualIdentity', $visualIdentity);
        });
    }
}
