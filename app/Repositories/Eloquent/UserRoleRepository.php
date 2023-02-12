<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\UserRole;
use App\Repositories\Contracts\UserRoleRepository as UserRoleRepositoryContract;

final class UserRoleRepository extends BaseRepository implements UserRoleRepositoryContract
{
    public function __construct(UserRole $model)
    {
        parent::__construct($model);
    }
}
