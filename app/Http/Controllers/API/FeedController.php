<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\CreateFeedRequest;
use App\Http\Requests\Feed\FeedRequest;
use App\Http\Requests\Feed\UpdateFeedRequest;
use App\Http\Resources\FeedResource;
use App\Http\Services\FeedService;

class FeedController extends Controller
{
    protected $feedService;

    public function __construct(FeedService $feedService)
    {
        $this->feedService = $feedService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FeedResource::collection($this->feedService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFeedRequest $request
     * @return FeedResource
     */
    public function store(CreateFeedRequest $request)
    {
        return new FeedResource($this->feedService->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param FeedRequest $feedRequest
     * @param int $id
     * @return FeedResource
     */
    public function show(FeedRequest $feedRequest, $id)
    {
        return new FeedResource($this->feedService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFeedRequest $request
     * @param int $id
     * @return FeedResource
     */
    public function update(UpdateFeedRequest $request, $id)
    {
        return new FeedResource($this->feedService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FeedRequest $feedRequest
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    public function destroy(FeedRequest $feedRequest, $id)
    {
        $this->feedService->delete($id);
        return ['success'];
    }
}
