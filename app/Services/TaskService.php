<?php

namespace App\Services;
use App\Models\Task;
use Exception;
use Log;

class TaskService
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function create($params){
        try{
            $params['status'] = 1;
            return $this->model->create($params);
        }catch(Exception $exception){
            Log::error($exception);
        }
    }

    public function update($task, $params){
        try{
            return $task->update($params);
        }catch(Exception $exception){
        }
    }

    public function getList(){
        return $this->model->paginate(2);
    }
}
