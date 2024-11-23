@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tasks in Category: {{ request()->route('categoryName') }}</h1>

    @if($tasks->isEmpty())
        <div class="alert alert-info" role="alert">
            No tasks found in this category.
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Task List</a>
</div>
@endsection
