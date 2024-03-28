<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{
    public function store(Request $request)
    {
        $token = $request->only("token");
        $user = $request->only("name", "email", "password", "role");
        // dd($user);
        if ($token = auth()->attempt($token)) {
            dd($user);
            $us = User::create($user);
            return response()->json([
                "message" => "User added successfully!",
                "User" => $us,
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $userId = User::find($id);
        $user = $request->all();
        $userId->update($user);
        return response()->json(['message' => 'User updated successfully!']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["message" => "deleted"]);
    }

    public function login()
    {

        dd(Auth::user());
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
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
