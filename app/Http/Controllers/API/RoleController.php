<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\RoleResource;
use App\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function show($id)
    {
        $role = Role::find($id);
        if ($role) {
            return new RoleResource($role);
        }

        return response()->json(['error' => 'Role not found'], 404);
    }
}
