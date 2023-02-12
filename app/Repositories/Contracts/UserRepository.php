<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface UserRepository extends BaseRepository
{
    public function getPaginatedUsersWhere(array $conditions);

    public function getPaginatedUsers();
}
