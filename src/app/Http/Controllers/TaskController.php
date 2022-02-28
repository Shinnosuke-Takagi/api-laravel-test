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

    public function createTask(Request $request, Task $task)
    {
        $folder = Folder::find($request->folder['id']);
        $folder->hasTasks()->save($task->fill($request->all()));
        return new TaskResource($task->load(['belongsFolder.author']));
    }

    public function updateTask(Request $request)
    {
        $task = Task::find($request->id);
        $task->fill($request->all())->save();
        return new TaskResource($task->load(['belongsFolder.author']));
    }
}
