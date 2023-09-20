<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use DataTables;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Facades\DataTables;

class TodolistController extends Controller
{
    protected $taskmodel;

    public function __construct(Todolist $task)
    {
        $this->taskmodel = $task;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isset(auth()->user()->id))
            return redirect()->route('tasks.index');

        return view('dashboard.task-detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.task-create');
    }


    public function getTasksDataTable()
    {
        if (isset(auth()->user()->id)) {
            if (auth()->user()->type == 'admin') {
                $data = Todolist::all();
            } else {
                $data = Todolist::all()->where('user_id', '=', auth()->user()->id);
            }
        } else {
            abort(401);
        }



        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<a href="' . Route('tasks.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('status', function ($row) {
                return $row->status == 1 ? 'Done'  : 'In progress';
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);

        // dd($tasklist);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // Create a new task using the validated data
        Todolist::create($validatedData);

        // Redirect to the task list or another page
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $todolist)
    {
        return view('todolists.show', compact('todolist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TodoList $task)
    {
        if (auth()->user()->id == $task->user_id || auth()->user()->type == 'admin') {
            return view('dashboard.task-edit', compact('task'));
        } else {
            return redirect()->route('tasks.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TodoList $task)
    {

        $task = TodoList::find($request->id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|int',
        ]);

        $validatedData['user_id'] = auth()->user()->id;


        $task->update($validatedData);


        // Redirect to the task list or another page
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Todolist::destroy($request->id);
        return redirect()->route('tasks.index');
    }
}
