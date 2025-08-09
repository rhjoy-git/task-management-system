<?php

namespace App\Models;

use App\Traits\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, TaskStatus;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'created' => \App\Events\TaskCreated::class,
        'updated' => \App\Events\TaskUpdated::class,
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];
}
