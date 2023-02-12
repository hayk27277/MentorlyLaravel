<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Contracts\MajorRepository as MajorRepositoryContract;
use App\Repositories\Contracts\UserRepository as UserRepositoryContract;
use App\Repositories\Contracts\UserRoleRepository as UserRoleRepositoryContract;
use App\Repositories\Eloquent\MajorRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\UserRoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserRoleRepositoryContract::class, UserRoleRepository::class);
        $this->app->bind(MajorRepositoryContract::class, MajorRepository::class);
    }

    public function boot(): void
    {
    }
}
