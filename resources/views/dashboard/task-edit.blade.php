{{-- task-edit.blade.php --}}

@extends('dashboard.layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Task</h4>
        </div>
        <div class="card-body">
            <form action="{{ route("tasks.update") }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $task->id }}">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1" @if($task->status == "1") selected @endif>Done</option>
                        <option value="0" @if($task->status == "0") selected @endif>in progress</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
@endsection
