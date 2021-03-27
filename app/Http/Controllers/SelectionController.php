<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Fracture;
use App\Supplier;
use App\Grade;
use App\TestsList;
use App\Type;
use App\TypeDescription;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SelectionController extends Controller
{
    public function selection()
    {
        $client = Client::with('projects')->get();
        $source = Supplier::all();
        $grade = Grade::with('description')->get();
        $type = Type::with('description')->get();

        return response()->json([
            'clients' => $client,
            'sources' => $source,
            'grades' => $grade,
            'types' => $type
        ]);
    }

    public function testselection($type)
    {
        $users = User::role('Technician')->get();
        $tests = Type::with('tests')->where('type', $type)->orwhere('belongs', $type)->first();
        return response()->json([
            'users' => $users,
            'tests' => $tests['tests']

        ]);
    }

    public function testrecord()
    {
        $tests = TestsList::all();
        return response()->json([
            'tests' => $tests

        ]);
    }

    public function addtestselection($type)
    {
        $tests = Type::where('type', $type)->first();
        $fractures = Fracture::all();
        return response()->json([
            'belongs' => $tests['belongs'],
            'fractures' => $fractures

        ]);
    }
}
