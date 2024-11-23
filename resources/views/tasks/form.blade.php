@extends('layouts.main')


<div class="form-group"> 
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
</div>

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ $tasks->title}}" />
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" rows="3" class="form-control">{!! $tasks->description !!}</textarea>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control" required>
        <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
</div>

<div class="form-group">
    <label for="due_date">Due Date</label>
    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $task->due_date ?? '') }}" required>
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach($kategori as $c)
            <option value="{{ $c->id }}" {{ old('category_id', $task->c_id ?? '') == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>
