<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tour;
use App\Observers\TourObserver;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Models\Vehicle;
use App\Observers\VehicleObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        require_once base_path('app/Helpers/helpers.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tour::observe(TourObserver::class);
    }
}
