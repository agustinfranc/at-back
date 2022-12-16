<?php

namespace App\Providers;

use App\Modules\Client\Interfaces\IGetClientRepository;
use App\Repositories\Client\GetClientRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        IGetClientRepository::class => GetClientRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'App\Modules\Client\Interfaces\IGetClientRepository',
        //     'App\Repositories\Client\GetClientRepository'
        // );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
