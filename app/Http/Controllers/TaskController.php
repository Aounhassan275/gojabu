<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\WeeklyTaskDay;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create($request->except('weekly_days'));
        if($request->weekly_days)
        {
            foreach($request->weekly_days as $day)
            {
                WeeklyTaskDay::create([
                    'task_id' => $task->id,
                    'day' => $day,
                ]);
            }

        }
        toastr()->success('Task is Created Successfully');
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
    public function markPending($id)
    {
        $task = Task::find($id);
        $task->update([
            'status' => 0
        ]);
        toastr()->success('Task Marked as Pending Successfully');
        return redirect()->back();
    }
    public function markComplete($id)
    {
        $task = Task::find($id);
        $task->update([
            'status' => 1
        ]);
        toastr()->success('Task Marked as Completed Successfully');
        return redirect()->back();
    }
}
