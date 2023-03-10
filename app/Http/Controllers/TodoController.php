<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Todo::create($data);

        return redirect('/');
    }

    public function update(Todo $todo)
    {
        $todo->update(['isDone' => true]);

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }
}
