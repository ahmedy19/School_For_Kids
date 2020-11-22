<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;

class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade Role for Admin
        Blade::if('hasrole',function($e){

            if(Auth::user())
            {
                if(Auth::user()->hasAnyRole($e))
                {
                    return true;
                }
            }
            return false;
        });


    }
}
