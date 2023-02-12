<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;

final class UserProfileController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function index(): UserResource
    {
        $user = auth()->user();

        return UserResource::make($user);
    }

    public function update(UpdateUserRequest $request): SuccessResource
    {
        $validated = $request->validated();

        $this->userRepository->update(auth()->id(), $validated);

        return SuccessResource::make([
            'message' => 'Personal information updated successfully.',
        ]);
    }
}
