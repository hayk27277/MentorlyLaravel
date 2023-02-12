<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        $users = $this->userRepository->getPaginatedUsers();

        return UserResource::collection($users);
    }

    public function show(int $id): UserResource
    {
        $user = $this->userRepository->findOrFail($id);

        return UserResource::make($user);
    }
}
