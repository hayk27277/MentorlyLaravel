<?php

namespace App\Http\Controllers\Api;

use App\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function login(LoginUserRequest $request): SuccessResource|ErrorResource
    {
        $credentials = $request->validated();

        $token = Auth::attempt($credentials);

        if (!$token) {
            return ErrorResource::make([
                'message' => 'Unauthorized',
            ]);
        }

        $user = Auth::user();

        return SuccessResource::make([
            'token' => $token,
            'user' => $user
        ]);

    }

    public function register(RegisterUserRequest $request): SuccessResource
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = $this->userRepository->create($validated);

        $token = Auth::login($user);

        return SuccessResource::make([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(): SuccessResource
    {
        Auth::logout();

        return SuccessResource::make([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh(): SuccessResource
    {
        return SuccessResource::make([
            'token' => Auth::refresh(),
        ]);
    }
}
