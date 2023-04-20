<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\Status\StoreStatusRequest;
use App\Http\Requests\Core\Status\UpdateStatusRequest;
use App\Http\Resources\Core\StatusResource;
use App\Models\Status;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $statuses = Status::all();
        return $this->makeResponse(
            StatusResource::collection($statuses),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreStatusRequest $request
     * @return JsonResponse
     */
    public function store(StoreStatusRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $status = Status::create($validated);

        return $this->makeResponse(
            new StatusResource($status),
            201,
            'Status was created successfully'
        );
    }

    /**
     * Display the specified resource.
     * @param Status $status
     * @return JsonResponse
     */
    public function show(Status $status): JsonResponse
    {
        return $this->makeResponse(
            new StatusResource($status),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $validated = $request->validated();
        $status->update($validated);

        return $this->makeResponse(
            new StatusResource($status),
            200,
            'Status was updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     * @param Status $status
     * @return JsonResponse
     */
    public function destroy(Status $status): JsonResponse
    {
        $status->delete();

        return $this->makeResponse(
            new StatusResource($status),
            200,
            'Status was deleted successfully'
        );
    }
}
