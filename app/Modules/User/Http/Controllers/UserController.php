<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Application\Services\UserService;
use App\Modules\User\Http\Requests\StoreUserRequest;
use App\Modules\User\Http\Requests\UpdateUserRequest;
use App\Modules\User\Http\Resources\UserResource;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ApiResponse;

    public function __construct(private readonly UserService $users)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $perPage = min((int) $request->integer('per_page', 15), 100);

        return $this->success(UserResource::collection($this->users->paginate($perPage))->response()->getData(true));
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        return $this->success(
            new UserResource($this->users->create($request->validated())),
            'User created.',
            Response::HTTP_CREATED
        );
    }

    public function show(int $id): JsonResponse
    {
        return $this->success(new UserResource($this->users->find($id)));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        return $this->success(new UserResource($this->users->update($id, $request->validated())), 'User updated.');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->users->delete($id);

        return $this->success(null, 'User deleted.');
    }
}
