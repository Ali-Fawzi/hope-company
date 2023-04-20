<?php

namespace App\Providers;

use App\Repositories\Interfaces\IReportsRepository;
use App\Repositories\Interfaces\ISalaryRepository;
use App\Repositories\Interfaces\ISalesRepository;
use App\Repositories\Interfaces\IStorageRepository;
use App\Repositories\Interfaces\IUsersRepository;
use App\Repositories\ReportsRepository;
use App\Repositories\SalaryRepository;
use App\Repositories\SalesRepository;
use App\Repositories\StorageRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ISalesRepository::class,
            SalesRepository::class
        );
        $this->app->bind(
            IStorageRepository::class,
            StorageRepository::class
        );
        $this->app->bind(
            IUsersRepository::class,
            UsersRepository::class
        );
        $this->app->bind(
            ISalaryRepository::class,
            SalaryRepository::class
        );
        $this->app->bind(
            IReportsRepository::class,
            ReportsRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
