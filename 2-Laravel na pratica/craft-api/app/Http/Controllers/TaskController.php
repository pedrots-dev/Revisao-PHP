<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function __construct(private readonly TaskService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->list();

        return ApiResponse::ok($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->service->create($request->validated());
        return ApiResponse::ok(new TaskResource($task), [], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = $this->service->findOrFail($id);

        return ApiResponse::ok( new TaskResource($task));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        $task = $this->service->update($id, $request->validated());

        return ApiResponse::ok( new TaskResource($task));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->noContent();
    }
}
