<?php

namespace App\Http\Controllers;

use App\CompressionTest;
use App\Concrete;
use App\Grade;
use Illuminate\Http\Request;

class CompressionTestController extends Controller
{
    public function index()
    {
        //
        return CompressionTest::get();
    }

    public function show($type, $id)
    {
        return CompressionTest::all();
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $sample = Concrete::where('id', $request->sample_id)->first();
        $grade = Grade::where('name', $sample->grade)->first();
        $gradenumber = $grade->grade_number;
        $test = new CompressionTest();
        $test->sample_ref = $sample->ref;
        $test->client_ref = $sample->client_ref;
        $test->date = $sample->date;
        $test->source = $sample->source;
        $test->status = 1;
        $test->cast_date = $sample->cast_date;
        $test->age = $sample->age;
        $test->grade = $sample->grade;
        $test->mix_description = $sample->mix_description;
        $area = (pi() * pow($request->diameter, 2)) / 4;
        $test->area = $area;
        $volume = $area * $request->length;
        $test->volume = $volume;
        $mpa = ($request->load / $area) * 1000;
        $test->mpa = $mpa;
        $test->mpa_per =  ($mpa * 100) / $gradenumber;
        $test->density = ($request->weight / $volume) / 1000000;
        $test->fill($data);
        $test->save();
        return response()->json($test);
    }

    public function update(Request $request, $id)
    {

        $test = CompressionTest::findOrFail($id);

        $data = $request->all();
        $test->update($data);
        $test->save();
        return response()->json($test);
    }


    public function destroy($id)
    {
        CompressionTest::where('id', $id)->delete();
        $test = CompressionTest::all();
        return response()->json($test);
    }
}
