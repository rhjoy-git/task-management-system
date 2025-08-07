<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Queue\SerializesModels;

class TaskUpdated
{
    use SerializesModels;

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
}
