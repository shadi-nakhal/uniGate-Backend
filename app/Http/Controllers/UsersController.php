<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        return  $user = User::whereHas('roles', function ($query) use ($request) {
            $search = $request->search;
            $query->whereRaw("CONCAT(firstname, ' ', lastname) LIKE '%$search%'")
                ->orWhere('lastname', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%")
                ->orWhere('ext', 'LIKE', "%{$search}%")
                ->orWhere('roles.name', 'LIKE', "%{$search}%");
        })->get();
    }

    public function show($id)
    {

        return User::where('id', $id)->first();
    }

    public function update(UsersRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $validated = $request->validated();

        $data = $request->all();
        if ($request->hasFile('image')) {
            $filename = uniqid();
            Storage::delete('/public/images/' . $user->image);
            $request->image->storeAs('images', $filename, 'public');

            $user->image = $filename;
        }
        $user->removeRole($user->role);
        $user->update($data);
        $user->assignRole($request->role);
        $user->save();
        return response()->json($user);
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (Storage::exists('/public/images/' . $user->image)) {
            Storage::delete('/public/images/' . $user->image);
        }
        User::where('id', $id)->delete();
        $users = User::all();
        return response()->json($users);
    }
}
