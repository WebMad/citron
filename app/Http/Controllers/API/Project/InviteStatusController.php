<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Invites\StatusRequest;
use App\Http\Resources\Project\InviteStatusResource;
use App\InviteStatus;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class InviteStatusController
 * @package App\Http\Controllers\API\Project
 */
class InviteStatusController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return InviteStatusResource::collection(InviteStatus::all());
    }

    /**
     * @param StatusRequest $statusRequest
     * @param $id
     * @return InviteStatusResource
     */
    public function show(StatusRequest $statusRequest, $id)
    {
        return new InviteStatusResource(InviteStatus::find($id));
    }
}
