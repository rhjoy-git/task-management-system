<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssigned extends Notification
{
    use Queueable;

    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new task has been assigned to you!')
            ->line('Title: ' . $this->task->title)
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Due Date: ' . \Carbon\Carbon::parse($this->task->due_date)->format('F j, Y, g:i a'));
    }

    public function toArray($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
            'message' => 'A new task has been assigned to you!',
        ];
    }
}
