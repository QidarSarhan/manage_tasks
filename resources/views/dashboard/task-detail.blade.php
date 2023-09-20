@extends('dashboard.layouts.layout') {{-- Use your layout --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Task List</h4>
        </div>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Create New Task</a>
        <div class="card-body">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th> <!-- Add a new header column for actions -->
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->status == '1' ? "Done" : "In progress"}}</td>
                    <td>
                        <!-- Action buttons for each task -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                        <!-- Add more action buttons if needed -->
                    </td>
                </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>



    {{-- delete --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('tasks.destroy') }}" method="POST">
                <div class="modal-content">

                    <div class="modal-body">
                        @csrf
                        @method('delete')

                        <div class="form-group">
                            <p>Delete</p>
                            <input type="hidden" name="id" id="id">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- delete --}}
@endsection




@push('javascripts')
    <script type="text/javascript">
        $(function() {
            console.log('What you');

            let table = $('#table_id').DataTable({
                ajax: "{{ Route('tasks.all') }}",
                columns: [
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'due_date',
                        name: 'due_date',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            console.log('table', table);


        });

        $('#table_id tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
@endpush
