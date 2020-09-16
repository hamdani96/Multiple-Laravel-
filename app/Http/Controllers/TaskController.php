<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', '2')->orderBy('id', 'desc')->paginate(10);
        return view('manage', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cost' => 'required'
         ]);
         
         $count = count($request->name);
     
         for ($i=0; $i < $count; $i++) { 
           $task = new Task();
           $task->name = $request->name[$i];
           $task->cost = $request->cost[$i];
           $task->save();
         }
     
         return redirect()->back();
    }
}
