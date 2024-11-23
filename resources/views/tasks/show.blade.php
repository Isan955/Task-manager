@extends('layouts.main')

@section('title', 'Detail Tugas')

@section('content')
<div class="container">
    <h1>Detail Tugas</h1>
    <h3>{{ $task->title }}</h3>
    <p>{{ $task->description }}</p>
    <p><strong>User:</strong> {{ $task->user_id }}</p>
    <p><strong>Kategori:</strong> {{ $task->category->name ?? 'N/A' }}</p> 
    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
