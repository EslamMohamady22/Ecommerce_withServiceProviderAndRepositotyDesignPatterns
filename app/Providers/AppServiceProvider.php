<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

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
        if(!app()->runningInConsole()){
            $setting = Setting::firstOr(function () {
                return Setting::create([
                    'name' => 'App_name',
                    'description' => 'Laravel'
                ]);
            });
            view()->share('setting', $setting);
        }
        
        
    }
}
