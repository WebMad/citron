<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Http\Services\Project\RoleService;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class RoleController
 * @package App\Http\Controllers\API
 */
class RoleController extends Controller
{

    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    /**
     * @param RoleRequest $roleRequest
     * @param $id
     * @return RoleResource|JsonResponse
     */
    public function show(RoleRequest $roleRequest, $id)
    {
        return new RoleResource($this->roleService->find($id));
    }
}
