<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\AuthenticationService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    public function __construct(private UserService $userService, private AuthenticationService $authenticationService)
    {
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $data = $request->safe()->only(['name', 'email', 'password']);
        $user = $this->userService->create($data);

        return $this->successResponse($user);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');
        $token = $this->authenticationService->authenticate($credentials, $remember);
        $user = $this->userService->findByConditions(['email' => $credentials['email']], first: true);
        $response = [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->successResponse($response);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return $this->successStatusResponse(__('messages.informations.I0001'));
    }
}
