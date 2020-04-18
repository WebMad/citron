<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\ProjectInviteResource;
use App\Http\Resources\UserResource;
use App\Http\Services\Project\ProjectInviteService;
use App\Http\Services\UserService;
use App\InviteStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */
class UserController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $where = [];
        if ($request->get('email')) {
            $where[] = ['email', '=', $request->get('email')];
        }
        return UserResource::collection($this->userService->all([], $where));
    }

    /**
     * @param UserRequest $userRequest
     * @param $id
     * @return AnonymousResourceCollection
     */
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
        $this->authorize('store', $this->userService->getModel());

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
        $this->authorize('update', $user);

        $this->userService->update($id, $updateUserRequest->all());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserRequest $userRequest
     * @param UserService $userService
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(UserRequest $userRequest, UserService $userService, $id)
    {
        $this->authorize('delete', $userService->find($id));

        $userService->delete($id);
        return response()->json(['success']);
    }

    /**
     * Возвращает приглашения пользователя
     *
     * @param UserRequest $userRequest
     * @param ProjectInviteService $projectInviteService
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function getInvites(UserRequest $userRequest, ProjectInviteService $projectInviteService, $id)
    {
        $invites = $projectInviteService->all([], [
            ['user_id', '=', $id],
            ['status_id', '=', InviteStatus::SENDED],
        ]);
        return ProjectInviteResource::collection($invites);
    }
}
