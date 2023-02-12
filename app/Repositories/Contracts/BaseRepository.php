<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface BaseRepository
{
    public function create(array $attributes): mixed;

    public function find(int $id): mixed;

    public function findOrFail(int $id): mixed;

    public function all(): mixed;

    public function delete(int $id): mixed;

    public function update(int $id, array $attributes): mixed;

    public function first(): mixed;

    public function last(): mixed;
}
