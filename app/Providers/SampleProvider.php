<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SampleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind('test',function(){
         return new \App\Test(config('mymail.testkey.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
