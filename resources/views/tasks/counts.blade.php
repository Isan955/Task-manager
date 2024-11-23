@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Task Counts by Category</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Task Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taskCounts as $taskCount)
                <tr>
                    <td>{{ $taskCount->name }}</td>
                    <td>{{ $taskCount->task_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
