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
        return TaskResource::collection(Task::all());
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function tasksByFolderId(Folder $belongsFolder)
    {
        return new TaskCollection($belongsFolder->hasTasks);
    }
}
