<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Jobs\SendTaskReminderJob;
use App\Models\Task;
use App\Notifications\TaskAssigned;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller as BaseController;

class TaskController extends BaseController
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->middleware('auth')->except(['index', 'show', 'apiIndex', 'apiShow']);
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = Task::with('user')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = $this->taskService->createTask($request->validated(), Auth::user());
        SendTaskReminderJob::dispatch($task)->delay(now()->addHours(24));
        Auth::user()->notify(new TaskAssigned($task));
        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->taskService->updateTask($task, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    // API Methods
    public function apiIndex()
    {
        return response()->json(Task::with('user')->get());
    }

    public function apiShow(Task $task)
    {
        return response()->json($task->load('user'));
    }

    public function apiStore(TaskRequest $request)
    {
        $task = $this->taskService->createTask($request->validated(), Auth::user());
        return response()->json($task, 201);
    }

    public function apiUpdate(TaskRequest $request, Task $task)
    {
        $task = $this->taskService->updateTask($task, $request->validated());
        return response()->json($task);
    }

    public function apiDestroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
?>