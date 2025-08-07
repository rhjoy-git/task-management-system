<!DOCTYPE html>
<html>
<head>
    <title>Task Reminder</title>
</head>
<body>
    <h1>Task Reminder</h1>
    <p>Dear {{ $task->user->name }},</p>
    <p>Your task "{{ $task->title }}" is overdue.</p>
    <p>Due Date: {{ $task->due_date }}</p>
    <p>Please complete it as soon as possible.</p>
    <p><a href="{{ url('/tasks/' . $task->id) }}">View Task</a></p>
</body>
</html>