<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Contracts\UserRepository as UserRepositoryContract;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    public function boot()
    {
        //
    }
}
