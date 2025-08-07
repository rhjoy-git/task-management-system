<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tasks</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create
            Task</a>
        <table class="w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Due Date</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="border p-2">{{ $task->title }}</td>
                        <td class="border p-2">{{ $task->due_date }}</td>
                        <td class="border p-2">{{ $task->status }}</td>
                        <td class="border p-2">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-500 ml-2">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
