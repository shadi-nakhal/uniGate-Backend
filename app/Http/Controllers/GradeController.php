<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        //
        return Grade::with('description')->get();
    }

    public function show($id)
    {
        //
        return Grade::where('id', $id)->first();
    }

    public function store(GradeRequest $request)
    {

        $data = $request->all();
        $grade = new Grade();
        $grade->fill($data);
        $grade->save();
        return response()->json($grade);
    }

    public function update(GradeRequest $request, $id)
    {

        $grade = Grade::findOrFail($id);

        $data = $request->all();
        $grade->update($data);
        $grade->save();
        return response()->json($grade);
    }


    public function destroy($id)
    {
        Grade::where('id', $id)->delete();
        $grade = Grade::all();
        return response()->json($grade);
    }
}
