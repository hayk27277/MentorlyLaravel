<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterUsersRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class UserFilterController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function __invoke(FilterUsersRequest $request): AnonymousResourceCollection
    {
        $validated = $request->validated();

        $users = $this->userRepository->getPaginatedUsersWhere($validated);

        return UserResource::collection($users);
    }
}
