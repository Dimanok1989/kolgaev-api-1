<?php

namespace App\Providers;

use App\Http\Services\FinanceService;
use App\Http\Services\Interfaces\FinanceServiceInterface;
use App\Http\Services\Interfaces\UserServiceInterface;
use App\Http\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Все связывания контейнера, которые должны быть зарегистрированы.
     *
     * @var array
     */
    public $bindings = [
        UserServiceInterface::class => UserService::class,
        FinanceServiceInterface::class => FinanceService::class,
    ];

    /**
     * Все синглтоны контейнера, которые должны быть зарегистрированы.
     *
     * @var array
     */
    public $singletons = [
    ];

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
        JsonResource::withoutWrapping();
    }
}
