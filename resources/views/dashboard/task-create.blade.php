@extends('dashboard.layouts.layout') {{-- Use your layout --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create Task</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
</div>
@endsection
