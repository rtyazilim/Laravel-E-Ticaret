<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Core\Exceptions\DomainException;
use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\LoginAction;
use App\Modules\Auth\Actions\LogoutAction;
use App\Modules\Auth\Actions\RegisterAction;
use App\Modules\Auth\DTOs\LoginDTO;
use App\Modules\Auth\DTOs\RegisterDTO;
use App\Modules\Auth\Http\Requests\LoginRequest;
use App\Modules\Auth\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly LoginAction    $loginAction,
        private readonly RegisterAction $registerAction,
        private readonly LogoutAction   $logoutAction,
    ) {}

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $result = $this->loginAction->execute(
                LoginDTO::fromRequest($request->validated()),
            );

            return $this->success($result, 'Giriş başarılı.');
        } catch (DomainException $e) {
            return $this->error($e->getMessage(), 401);
        }
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $result = $this->registerAction->execute(
                RegisterDTO::fromRequest($request->validated()),
            );

            return $this->success($result, 'Kayıt başarılı.', 201);
        } catch (DomainException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        $this->logoutAction->execute(
            $request->user(),
            $request->bearerToken() ? $request->user()->currentAccessToken()->name : 'api',
        );

        return $this->success(null, 'Çıkış başarılı.');
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        return $this->success([
            'id'          => $user->id,
            'name'        => $user->name,
            'email'       => $user->email,
            'roles'       => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ]);
    }

    private function success(mixed $data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ], $status);
    }

    private function error(string $message, int $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data'    => null,
            'message' => $message,
        ], $status);
    }
}
