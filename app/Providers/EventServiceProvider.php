<?php

namespace App\Providers;

use App\Events\TaskCreated;
use App\Events\TaskUpdated;
use App\Listeners\SendTaskCreatedNotification;
use App\Listeners\SendTaskUpdatedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TaskCreated::class => [
            SendTaskCreatedNotification::class,
        ],
        TaskUpdated::class => [
            SendTaskUpdatedNotification::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
?>