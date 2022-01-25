<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::with(['belongsFolder.author'])->get());
    }

    public function show(Task $task)
    {
        return new TaskResource($task->load(['belongsFolder.author']));
    }
}
