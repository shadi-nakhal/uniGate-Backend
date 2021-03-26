<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        //
        return Type::get();
    }

    public function show($id)
    {
        //
        return Type::where('id', $id)->first();
    }

    public function store(TypeRequest $request)
    {

        $data = $request->all();
        $type = new Type();
        $type->fill($data);
        $type->save();
        return response()->json($type);
    }

    public function update(TypeRequest $request, $id)
    {

        $type = Type::findOrFail($id);

        $data = $request->all();
        $type->update($data);
        $type->save();
        return response()->json($type);
    }


    public function destroy($id)
    {
        Type::where('id', $id)->delete();
        $type = Type::all();
        return response()->json($type);
    }
}
