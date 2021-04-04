<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskResquest;
use App\Http\Resources\TaskResource;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole("Head of lab")) {
            return TaskResource::collection(Task::paginate(10));
        } else {
            return TaskResource::collection(Task::where('technician_id', auth()->user()->id)->paginate(10));
        }
    }

    public function show($type, $id)
    {
        // return Task::where('sample_id', $id)->where('sample_type', $type)->get();

        return TaskResource::collection(Task::where('sample_id', $id)->where('sample_type', $type)->get());
    }

    public function store(TaskResquest $request)
    {

        $data = $request->all();
        $sample =
            $task = new Task();
        $task->fill($data);
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
        $target = Task::where('id', $id)->first();
        $task = Task::all();
        if (auth()->user()->hasRole("Head of lab")) {
            Task::where('id', $id)->delete();

            return response()->json($task);
        } else if (auth()->user()->hasRole("Technician")) {
            if ((int)$target['technician_id'] == (int)auth()->user()->id) {
                Task::where('id', $id)->delete();
                $task = Task::all();
                return response()->json($task);
            } else {
                return  response()->json([
                    'errors' => ['U n a u t h o r i z e d']
                ], 403);
            }
        } else {
            return  response()->json([
                'errors' => ['U n a u t h o r i z e d']
            ], 403);
        }
    }
}
