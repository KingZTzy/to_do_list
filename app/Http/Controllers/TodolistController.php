<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        return view('todolist', [
            'todolists' => Todolist::all(),
            'title' => 'To-Do-List'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($data);
        return redirect('/main/todolist');
    }

    public function edit(Todolist $todolist)
    {
        return view('edit', [
            'todolist' => $todolist,
            'title' => 'Edit'
        ]);
    }
    
    public function update(Request $request, Todolist $todolist)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::where('id', $todolist->id)
            ->update($data);
            
        return redirect('/main/todolist');
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return redirect('/main/todolist');
    }

    public function completed(Todolist $todolist) 
    {
        $todolist->update(['completed' => !$todolist->completed]);
        return redirect('/main/todolist');
    }
}
