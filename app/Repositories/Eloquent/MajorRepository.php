<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Major;
use App\Repositories\Contracts\MajorRepository as MajorRepositoryContract;

final class MajorRepository extends BaseRepository implements MajorRepositoryContract
{
    public function __construct(Major $model = null)
    {
        $this->model = $model;
    }
}
