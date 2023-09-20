@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Todo List</h5>
                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('todolists.create') }}" class="btn btn-primary mb-2">Add Task</a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todolists as $todolist)
                                    <tr>
                                        <td>{{ $todolist->title }}</td>
                                        <td>{{ $todolist->description }}</td>
                                        <td>
                                            {{-- <a href="{{ route('todolists.show', $todolist) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('todolists.edit', $todolist) }}" class="btn btn-sm btn-primary">Edit</a>
                                             --}}
                                            {{-- <form method="POST" action="{{ route('todolists.destroy', $todolist) }}" class="d-inline"> --}}
                                                {{-- @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button> --}}
                                            {{-- </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection