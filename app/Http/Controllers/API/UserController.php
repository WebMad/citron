<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @param UserService $userService
     * @return AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(UserService $userService)
    {
        return UserResource::collection($userService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @param UserService $userService
     * @return JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CreateUserRequest $request, UserService $userService)
    {
        $this->authorize('create-user');

        $params = $request->all();
        $params['role_id'] = User::USER;

        $user = $userService->create($params);

        return response()->json([
            'user' => new UserResource($user),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param UserService $userService
     * @param int $id
     * @return UserResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(UserService $userService, $id)
    {
        $user = $userService->find($id);
        if ($user) {
            return new UserResource($userService->find($id));
        }
        return response()->json(['error' => __('User not found')], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param UserService $userService
     * @param int $id
     * @return UserResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateUserRequest $request, UserService $userService, $id)
    {
        $user = $userService->update($id, $request->all());
        if ($user) {
            $this->authorize('update-user', $user);
            return new UserResource($user);
        }
        return response()->json(['error' => __('User not found')], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserService $userService
     * @param int $id
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(UserService $userService, $id)
    {
        $user = $userService->find($id);
        if($user) {
            $this->authorize('delete-user', $user);

            $userService->delete($id);
            return response()->json(['success']);
        }

        return response()->json(['error' => __('User not found')], 404);
    }
}
