<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function createTask(array $data, $user)
    {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'due_date' => $data['due_date'],
            'user_id' => $user->id,
            'status' => 'pending',
        ]);
    }

    public function updateTask(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }
}
?>