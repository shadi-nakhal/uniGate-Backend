<?php

namespace App\Http\Controllers;

use App\Material;
use App\SandTest;
use Illuminate\Http\Request;

class SandTestController extends Controller
{
    public function index()
    {
        //
        return SandTest::get();
    }

    public function show($type, $id)
    {
        return SandTest::all();
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $sample = Material::where('id', $request->sample_id)->first();
        $test = new SandTest();
        $test->sample_ref = $sample->ref;
        $test->client_ref = $sample->client_ref;
        $test->date = $sample->date;
        $test->source = $sample->source;
        $test_result = $request->clay_reading / $request->sand_reading;
        $test->test_result = $test_result;
        $test_result2 = $request->clay_reading2 / $request->sand_reading2;
        $test->test_result2 = $test_result2;
        $test->average = ($test_result + $test_result2) / 2;
        $test->fill($data);
        $test->save();
        return response()->json($test);
    }

    public function update(Request $request, $id)
    {

        $test = SandTest::findOrFail($id);

        $data = $request->all();
        $test->update($data);
        $test->save();
        return response()->json($test);
    }


    public function destroy($id)
    {
        SandTest::where('id', $id)->delete();
        $test = SandTest::all();
        return response()->json($test);
    }
}
