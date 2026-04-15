<?php

namespace App\Providers;

use App\Repositories\Contracts\LoginLogRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;
use App\Repositories\Json\JsonLoginLogRepository;
use App\Repositories\Json\JsonUserRepository;
use App\Repositories\Json\JsonVerificationHistoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, JsonUserRepository::class);
        $this->app->bind(LoginLogRepositoryInterface::class, JsonLoginLogRepository::class);
        $this->app->bind(VerificationHistoryRepositoryInterface::class, JsonVerificationHistoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
