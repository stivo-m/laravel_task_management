<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\Tasks\StoreTaskRequest;
use App\Http\Requests\Core\Tasks\UpdateTaskRequest;
use App\Http\Resources\Core\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tasks = TaskResource::collection(Task::paginate(50));
        return $this->makeResponse($tasks);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTaskRequest $request
     * @return JsonResponse
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $task = Task::create($validated);
        return $this->makeResponse(
            $task,
            201,
            'Task created successfully'
        );
    }

    /**
     * Display the specified resource.
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return $this->makeResponse(
            $task,
            200,
        );
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $validated = $request->validated();
        $task->update($validated);
        return $this->makeResponse(
            $task,
            200,
            'Task updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     * @param Task $task
     * @return JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return $this->makeResponse(
            $task,
            200,
            'Task deleted successfully'
        );
    }
}
