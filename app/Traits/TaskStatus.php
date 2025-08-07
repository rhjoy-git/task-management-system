<?php

namespace App\Traits;

trait TaskStatus
{
    public function markAsCompleted()
    {
        $this->status = 'completed';
        $this->save();
    }

    public function isOverdue()
    {
        return now()->greaterThan($this->due_date) && $this->status !== 'completed';
    }
}
?>