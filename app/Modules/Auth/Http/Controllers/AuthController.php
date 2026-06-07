<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Application\Services\AuthService;
use App\Modules\Auth\Http\Requests\LoginRequest;
use App\Modules\Auth\Http\Requests\RegisterRequest;
use App\Modules\User\Http\Resources\UserResource;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(private readonly AuthService $auth)
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $result = $this->auth->register($request->validated());

        return $this->success([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
        ], 'Registered.', Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->auth->login($request->validated());

        return $this->success([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
        ], 'Logged in.');
    }

    public function me(Request $request): JsonResponse
    {
        return $this->success(new UserResource($request->user()));
    }

    public function logout(Request $request): JsonResponse
    {
        $this->auth->logout($request->user());

        return $this->success(null, 'Logged out.');
    }
}
