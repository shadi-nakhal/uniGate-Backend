<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Material;


class MaterialController extends Controller
{
    public function index()
    {
        // return Material::with('client', 'project', 'technician', 'tasks')->paginate(10);
        //return MaterialResource::collection(Material::with('client', 'project', 'technician', 'tasks')->paginate(10));
        return MaterialResource::collection(Material::paginate(10));
    }

    public function show($id)
    {
        return Material::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $lastSample = Material::orderBy('created_at', 'desc')->first();
        $data = $request->all();
        $material = new Material();
        $material->fill($data);
        if (isset($lastSample)) {
            $material->ref = 'MA-' . date('M') . '-' . "00" . ($lastSample->id + 1);
        } else {
            $material->ref = 'MA-' . date('M') . '-' . "001";
        }
        $material->save();
        return response()->json($material);
    }

    public function update(Request $request, $id)
    {

        $material = Material::findOrFail($id);

        $data = $request->all();
        $material->update($data);
        $material->save();
        return response()->json($material);
    }


    public function destroy($id)
    {
        Material::where('id', $id)->delete();
        return Material::with('client', 'project', 'technician')->paginate(10);
    }
}
