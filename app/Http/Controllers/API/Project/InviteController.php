<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\Invites\CreateInviteRequest;
use App\Http\Requests\Project\Invites\InviteRequest;
use App\Http\Requests\Project\Invites\UpdateInviteRequest;
use App\Http\Resources\ProjectInviteResource;
use App\Http\Controllers\Controller;
use App\Http\Services\Project\ProjectInviteService;
use App\Http\Services\Project\ProjectUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InviteController extends Controller
{
    /**
     * @var ProjectInviteService
     */
    private $projectInviteService;

    /**
     * @var ProjectUserService
     */
    private $projectUserService;

    /**
     * InviteController constructor.
     * @param ProjectInviteService $projectInviteService
     * @param ProjectUserService $projectUserService
     */
    public function __construct(ProjectInviteService $projectInviteService, ProjectUserService $projectUserService)
    {
        $this->projectInviteService = $projectInviteService;
        $this->projectUserService = $projectUserService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectInviteResource::collection($this->projectInviteService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateInviteRequest $createProjectRequest
     * @return ProjectInviteResource
     */
    public function store(CreateInviteRequest $createProjectRequest)
    {
        if (!$this->projectInviteService->all([], [
            ['project_id', '=', $createProjectRequest->get('project_id')],
            ['user_id', '=', $createProjectRequest->get('user_id')]
        ])) {
            $this->projectUserService->create([
                'project_id' => $createProjectRequest->get('project_id'),
                'user_id' => $createProjectRequest->get('user_id'),
                'project_role_id' => $createProjectRequest->get('project_role_id'),
                'confirmed' => false,
            ]);

            return new ProjectInviteResource($this->projectInviteService->create($createProjectRequest->all()));
        }
        return response()->json([
            'error' => 'Приглашение уже отправлено'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param InviteRequest $inviteRequest
     * @param int $id
     * @return ProjectInviteResource
     */
    public function show(InviteRequest $inviteRequest, $id)
    {
        return new ProjectInviteResource($this->projectInviteService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInviteRequest $updateInviteRequest
     * @param int $id
     * @return ProjectInviteResource
     */
    public function update(UpdateInviteRequest $updateInviteRequest, $id)
    {
        return new ProjectInviteResource($this->projectInviteService->update($id, $updateInviteRequest->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->projectInviteService->delete($id);
        return response()->json(['success']);
    }

    /**
     * @param InviteRequest $inviteRequest
     * @param $id
     * @return JsonResponse
     */
    public function accept(InviteRequest $inviteRequest, $id)
    {
        $this->projectInviteService->accept($id);
        return response()->json(['success']);
    }

}
