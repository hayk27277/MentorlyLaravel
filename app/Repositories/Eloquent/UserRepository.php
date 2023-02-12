<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository as UserRepositoryContract;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * @property User $model
 */
class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getPaginatedUsers(): Paginator
    {
        return $this->model->query()->simplePaginate(20);
    }

    public function getPaginatedUsersWhere(array $conditions): Paginator
    {
        if (isset($conditions['search_query'])) {
            $this->model = $this->model->search($conditions['search_query']);
        }

        if (isset($conditions['user_role_id'])) {
            $this->model = $this->model->where('user_role_id', $conditions['user_role_id']);
        }

        if (isset($conditions['registration_date'])) {
            $this->model = $this->model->orderBy('created_at', $conditions['registration_date']);
        }

        $perPage = $conditions['per_page'] ?? 20;

        return $this->model->simplePaginate($perPage);
    }
}
