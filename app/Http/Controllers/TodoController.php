<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        // show page only
        // return inertia('Todo/index');
        // $todos = auth()->user()->todos;
        // dd($todos);
        return inertia('Todo/index', [
            'todos' => auth()->user()->todos
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Todo/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = new Todo();
        $todo->task = $request->task;
        $todo->description = $request->description ?? null;
        $todo->status = "0";
        $todo->user()->associate(auth()->user());
        $todo->save();

        return to_route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return back();
    }
}
