<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'apiIndex'])->name('api.tasks.index');
    Route::post('/tasks', [TaskController::class, 'apiStore'])->name('api.tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'apiShow'])->name('api.tasks.show');
    Route::put('/tasks/{task}', [TaskController::class, 'apiUpdate'])->name('api.tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'apiDestroy'])->name('api.tasks.destroy');
});
