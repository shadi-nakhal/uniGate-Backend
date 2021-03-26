<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with('client')->get();
    }

    public function show($id)
    {
        return Project::where('id', $id)->first();
    }

    public function store(ProjectRequest $request)
    {

        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->save();
        return response()->json($project);
    }

    public function update(ProjectRequest $request, $id)
    {

        $project = Project::findOrFail($id);

        $data = $request->all();
        $project->update($data);
        $project->save();
        return response()->json($project);
    }


    public function destroy($id)
    {
        Project::where('id', $id)->delete();
        $project = Project::all();
        return response()->json($project);
    }
}
