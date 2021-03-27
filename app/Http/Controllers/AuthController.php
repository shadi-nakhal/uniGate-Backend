<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

class AuthController extends Controller
{
    public function register(UsersRequest $request)
    {
        $request->validated();
        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageFilename = uniqid();
            $request->image->storeAs('images', $imageFilename, 'public');
        } else {
            $imageFilename = "avatar";
        }
        $user = new User();
        $user->image = $imageFilename;
        $user->status = 1;
        $user->fill($data);
        $user->assignRole($request->role);
        $user->save();
        return response()->json([
            'user' => $user
        ]);
    }
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function profile()
    {
        if (auth()->user()) {
            return response()->json([
                'user' => auth()->user()
            ]);
        }
        return null;
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
