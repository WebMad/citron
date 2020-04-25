<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Services\CommentService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentController extends Controller
{

    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CommentResource::collection($this->commentService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCommentRequest $request
     * @return CommentResource
     */
    public function store(CreateCommentRequest $request)
    {
        return new CommentResource($this->commentService->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param CommentRequest $request
     * @param int $id
     * @return CommentResource
     */
    public function show(CommentRequest $request, $id)
    {
        return new CommentResource($this->commentService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCommentRequest $request
     * @param int $id
     * @return CommentResource
     */
    public function update(UpdateCommentRequest $request, $id)
    {
        return new CommentResource($this->commentService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CommentRequest $request
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    public function destroy(CommentRequest $request, $id)
    {
        $this->commentService->delete($id);
        return ['success'];
    }
}
