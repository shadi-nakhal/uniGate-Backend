<?php

namespace App\Http\Controllers;

use App\MixDescription;
use Illuminate\Http\Request;
use App\Http\Requests\MixDescriptionRequest;


class MixDescriptionController extends Controller
{
    public function index()
    {
        return MixDescription::with('grade')->get();
    }

    public function show($id)
    {
        return MixDescription::where('id', $id)->first();
    }

    public function store(MixDescriptionRequest $request)
    {

        $data = $request->all();
        $description = new MixDescription();
        $description->fill($data);
        $description->save();
        return response()->json($description);
    }

    public function update(MixDescriptionRequest $request, $id)
    {

        $description = MixDescription::findOrFail($id);

        $data = $request->all();
        $description->update($data);
        $description->save();
        return response()->json($description);
    }


    public function destroy($id)
    {
        MixDescription::where('id', $id)->delete();
        $description = MixDescription::all();
        return response()->json($description);
    }
}
