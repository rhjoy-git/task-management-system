<!DOCTYPE html>
<html>
<head>
    <title>Edit Task - Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="mt-1 block w-full border rounded p-2" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border rounded p-2">{{ old('description', $task->description) }}</textarea>
            </div>
            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                <input type="datetime-local" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full border rounded p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="text-gray-500 ml-4">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>