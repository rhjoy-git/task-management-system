<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Notifications\TaskAssigned;

class SendTaskCreatedNotification
{
    public function handle(TaskCreated $event)
    {
        $event->task->user->notify(new TaskAssigned($event->task));
    }
}
?>