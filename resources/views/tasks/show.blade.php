<!DOCTYPE html>
<html>
<head>
    <title>Task Details - Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Task Details</h1>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold">{{ $task->title }}</h2>
            <p class="mt-2 text-gray-600"><strong>Description:</strong> {{ $task->description ?? 'No description provided' }}</p>
            <p class="mt-2 text-gray-600"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p class="mt-2 text-gray-600"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
            <p class="mt-2 text-gray-600"><strong>Assigned To:</strong> {{ $task->user->name }}</p>
            <div class="mt-4">
                <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                </form>
                <a href="{{ route('tasks.index') }}" class="text-gray-500 ml-4">Back to Tasks</a>
            </div>
        </div>
    </div>
</body>
</html>