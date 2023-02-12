<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepository as BaseRepositoryContract;

abstract class BaseRepository implements BaseRepositoryContract
{
    public function __construct(protected mixed $model = null)
    {
    }

    public function create(array $attributes): mixed
    {
        return $this->model->create($attributes);
    }

    public function find(int $id): mixed
    {
        return $this->model->find($id);
    }

    public function findOrFail(int $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    public function all(): mixed
    {
        return $this->model->all();
    }

    public function delete(int $id): mixed
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function update(int $id, array $attributes): mixed
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function first(): mixed
    {
        return $this->model->first();
    }

    public function last(): mixed
    {
        return $this->model->orderByDesc('id')->first();
    }

    public function paginate(int $count = 20): mixed
    {
        return $this->model->paginate($count);
    }
}
