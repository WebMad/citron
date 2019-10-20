<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection($this->userService->all());
    }

    public function getProjects(UserRequest $userRequest, $id)
    {
        return ProjectResource::collection($this->userService->getProjects($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(CreateUserRequest $request)
    {
        $this->authorize('create-user');

        $user = $this->userService->create($request->all());

        return response()->json([
            'user' => new UserResource($user),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param UserRequest $userRequest
     * @param int $id
     * @return UserResource
     */
    public function show(UserRequest $userRequest, $id)
    {
        return new UserResource($this->userService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $updateUserRequest
     * @param int $id
     * @return UserResource
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $updateUserRequest, $id)
    {
        $user = $this->userService->find($id);
        $this->authorize('update-user', $user);

        $this->userService->update($id, $updateUserRequest->all());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserRequest $userRequest
     * @param UserService $userService
     * @param int $id
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(UserRequest $userRequest, UserService $userService, $id)
    {
        $this->authorize('delete-user', $userService->find($id));

        $userService->delete($id);
        return response()->json(['success']);
    }
}
