<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\CreateRequest;
use App\Http\Requests\Api\Task\UpdateRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function index(Request $request){
        $result = $this->taskService->getList();

        return response()->json($result,200);
    }

    public function store(CreateRequest $createRequest){
        $request = $createRequest->validated();
        $result = $this->taskService->create($request);

        if($result){
            return response()->json($result,200);
        }

        return response()->json(["msg"=>"loi"],400);
    }

    public function update(UpdateRequest $updateRequest, Task $task){
        return response()->json(["msg"=>"loi"],400);

    }
}
