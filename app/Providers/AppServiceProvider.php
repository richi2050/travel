<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('string_exist', function($attribute, $value, $parameters) {
           dd($parameters);
        });


        Validator::extend('alpha_num_spaces', function($attribute, $value, $parameters)
        {
            return preg_match('/(^[A-Za-z0-9-ñÑáéíóúÁÉÍÓÚ ]+$)+/', $value);

        });
        /*
         * array:2 [
              0 => "users"
              1 => "email_address"
            ]
         * */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
