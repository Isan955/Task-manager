@extends('layouts.main')

@section('title', 'Edit Tugas')

@section('content')
<div class="container">
    <h1>Edit Tugas</h1>
    <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tasks.form') <!-- Menggunakan partial view -->
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
