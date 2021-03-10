<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;

use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        return  $cohort = User::query()
            ->whereRaw("CONCAT(firstname, ' ', lastname) LIKE '%$request->search%'")
            ->orWhere('lastname', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('mobile', 'LIKE', "%{$search}%")
            ->orWhere('ext', 'LIKE', "%{$search}%")
            ->get();
    }

    public function show($id)
    {
        //
        return User::where('id', $id)->first();
    }

    public function update(UsersRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $validated = $request->validated();

        $data = $request->all();
        if ($request->hasFile('image')) {
            $filename = uniqid();
            if ($user->image != "avatar") {
                Storage::delete('/public/images/' . $user->image);
            }
            $request->image->storeAs('images', $filename, 'public');

            $user->image = $filename;
        }
        $user->update($data);
        $user->save();
        return response()->json($user);
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (Storage::exists('/public/images/' . $user->image) && $user->image != "avatar") {
            Storage::delete('/public/images/' . $user->image);
        }
        User::where('id', $id)->delete();
        return response()->json($user);
    }
}
