@extends('layouts.main')

@section('content')
<h1>Create New Task</h1>


<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="user">User</label>
        <input type="text" id="user" class="form-control" value="{{ Auth::user()->name }}" readonly>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}"> 
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    
    <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($kategori as $category) <!-- Ganti $kategori dengan $categories -->
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Create Task</button>
</form>

@endsection
