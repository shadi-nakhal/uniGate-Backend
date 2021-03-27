<?php

namespace App\Http\Controllers;

use App\TypeDescription;
use Illuminate\Http\Request;

class TypeDescriptionController extends Controller
{
    public function index()
    {
        //
        return TypeDescription::get();
    }

    public function show($id)
    {
        //
        return TypeDescription::where('id', $id)->first();
    }

    public function store(TypeDescriptionRequest $request)
    {

        $data = $request->all();
        $description = new TypeDescription();
        $description->fill($data);
        $description->save();
        return response()->json($description);
    }

    public function update(TypeDescriptionRequest $request, $id)
    {

        $description = TypeDescription::findOrFail($id);

        $data = $request->all();
        $description->update($data);
        $description->save();
        return response()->json($description);
    }


    public function destroy($id)
    {
        TypeDescription::where('id', $id)->delete();
        $description = TypeDescription::all();
        return response()->json($description);
    }
}
