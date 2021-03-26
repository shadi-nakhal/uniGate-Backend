<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConcreteRequest;
use DateTime;
use DateInterval;
use App\Concrete;


class ConcreteController extends Controller
{
    public function index()
    {
        //
        return Concrete::with('client', 'project', 'technician')->paginate(10);
    }

    public function show($id)
    {
        //
        return Concrete::where('id', $id)->first();
    }

    public function store(ConcreteRequest $request)
    {
        $lastSample = Concrete::orderBy('created_at', 'desc')->first();
        $data = $request->all();
        $concrete = new Concrete();
        $concrete->fill($data);
        $Date1 = $request->cast_date;
        $date = new DateTime($Date1);
        $date->add(new DateInterval('P' . $request->age . 'D'));
        $Date2 = $date->format('Y-m-d');
        $concrete->test_date = $Date2;
        if (isset($lastSample)) {
            $concrete->ref = 'Co-' . date('M') . '-' . "00" . ($lastSample->id + 1);
        } else {
            $concrete->ref = 'Co-' . date('M') . '-' . "001";
        }
        $concrete->save();
        return response()->json($concrete);
    }

    public function update(ConcreteRequest $request, $id)
    {

        $concrete = Concrete::findOrFail($id);

        $data = $request->all();
        $concrete->update($data);
        $concrete->save();
        return response()->json($concrete);
    }


    public function destroy($id)
    {
        Concrete::where('id', $id)->delete();
        return Concrete::with('client', 'project', 'technician')->paginate(10);
    }
}
