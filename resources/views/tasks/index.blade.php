@extends('layouts.main')

@section('content')
<h1>Tasks</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>User</th>
            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->user->name }}</td> 
            <td>{{ $task->id }}</td>
            <td>{{ $task->category ? $task->category->name : 'N/A' }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
