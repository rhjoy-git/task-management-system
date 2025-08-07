<?php

namespace App\Listeners;

use App\Events\TaskUpdated;
use App\Notifications\TaskUpdatedNotification;

class SendTaskUpdatedNotification
{
    public function handle(TaskUpdated $event)
    {
        $event->task->user->notify(new TaskUpdatedNotification($event->task));
    }
}
?>