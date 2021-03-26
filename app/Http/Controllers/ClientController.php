<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;

use Validator;

class ClientController extends Controller
{

    public function index()
    {
        return Client::with('projects')->get();
    }

    public function show($id)
    {
        return Client::where('id', $id)->first();
    }

    public function store(ClientRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $client = new Client();
        $client->fill($data);
        $client->save();
        return response()->json($client);
    }

    public function update(ClientRequest $request, $id)
    {
        $request->validated();
        $client = Client::findOrFail($id);
        $data = $request->all();
        $client->update($data);
        $client->save();
        return response()->json($client);
    }


    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return "deleted";
    }
}
