<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fracture;

class FractureController extends Controller
{
    public function index()
    {
        //
        return Fracture::get();
    }

    public function show($id)
    {
        //
        return Fracture::where('id', $id)->first();
    }

    public function store(FractureRequest $request)
    {

        $data = $request->all();
        $fracture = new Fracture();
        $fracture->fill($data);
        $fracture->save();
        return response()->json($fracture);
    }

    public function update(FractureRequest $request, $id)
    {

        $fracture = Fracture::findOrFail($id);

        $data = $request->all();
        $fracture->update($data);
        $fracture->save();
        return response()->json($fracture);
    }


    public function destroy($id)
    {
        Fracture::where('id', $id)->delete();
        $fracture = Fracture::all();
        return response()->json($fracture);
    }
}
