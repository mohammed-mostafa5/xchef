<?php

namespace App\Providers;

use App\Models\Administrator;
use App\Models\MealCreator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'administrator' => Administrator::class,
            'meal_creator' => MealCreator::class
        ]);
    }
}
