<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRoleResource;
use App\Repositories\Contracts\UserRoleRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class UserRoleController extends Controller
{
    public function __construct(
        private UserRoleRepository $userRoleRepository
    ) {
    }

    public function __invoke(): AnonymousResourceCollection
    {
        $roles = $this->userRoleRepository->all();

        return UserRoleResource::collection($roles);
    }
}
