<?php

namespace App\Providers;

use App\Repositories\Contracts\LoginLogRepositoryInterface;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;
use App\Repositories\Db\DbVerificationHistoryRepository;
use App\Repositories\Json\JsonLoginLogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginLogRepositoryInterface::class, JsonLoginLogRepository::class);
        $this->app->bind(VerificationHistoryRepositoryInterface::class, DbVerificationHistoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
