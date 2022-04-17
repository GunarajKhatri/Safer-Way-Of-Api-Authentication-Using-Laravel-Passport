<?php

namespace App\Providers;

use App\Support\HashManager;
use Illuminate\Support\ServiceProvider;

class HashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(HashManager::class,function($app){
            return new HashManager(PASSWORD_BCRYPT);
       });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    

}
