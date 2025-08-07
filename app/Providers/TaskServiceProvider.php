<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\TaskService', function ($app) {
            return new \App\Services\TaskService();
        });
    }
}
?>