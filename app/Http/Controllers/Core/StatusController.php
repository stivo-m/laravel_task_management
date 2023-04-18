<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\Status\StoreStatusRequest;
use App\Http\Requests\Core\Status\UpdateStatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
                'statuses' => StatusResource::collection(Status::all()),
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $validated = $request->validated();

        $names = [];
        foreach ($validated['statuses'] as $status){
            $names[] = ['name' => $status, 'created_at' => Carbon::now()];
        }
        $statusList = Status::insert($names);
        return response()->json([
                'message' => 'Statuses created successfully',
                'statuses' => StatusResource::collection(Status::all()),
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return response()->json([
                'status' => new StatusResource($status),
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $validated = $request->validated();
        $status->update($validated);

        return response()->json([
            'message' => 'Status updated successfully',
            'status' => new StatusResource($status),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return response()->json([
            'message' => 'Status deleted successfully',
            'status' => new StatusResource($status),
        ], 200);
    }
}
