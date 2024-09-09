<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::simplePaginate(5);//全てのタスクを取得
        return view("tasks.index", ['tasks' => $tasks]); //'tasks'としてビューに渡す。
    }

    public function create()
    {
        return view('tasks.create'); //新規作成ページを表示
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'details'=> 'nullable',
        ]);

        Task::create($request->all()); //新規タスクを保存
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'=> 'required',
            'details'=> 'nullable',
            'completed'=>'boolean',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = $request->has('completed');
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}