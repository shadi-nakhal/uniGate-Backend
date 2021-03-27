<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskResquest;
use App\Http\Resources\TaskResource;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //
        // return Task::get();
        return TaskResource::collection(Task::with('concrete')->with('material')->paginate(10));
    }

    public function show($type, $id)
    {
        return Task::where('sample_id', $id)->where('sample_type', $type)->get();
    }

    public function store(TaskResquest $request)
    {

        $data = $request->all();
        $sample =
            $task = new Task();
        $task->fill($data);
        $technician_name = User::where('id', $request->technician_id)->first();
        $task->technician_name = $technician_name->firstname . " " . $technician_name->lastname;
        $task->save();
        return response()->json($task);
    }

    public function update(TaskResquest $request, $id)
    {

        $task = Task::findOrFail($id);
        $data = $request->all();
        $task->update($data);
        $task->save();
        return response()->json($task);
    }


    public function destroy($id)
    {
        Task::where('id', $id)->delete();
        $task = Task::all();
        return response()->json($task);
    }
}
