<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthContoller extends Controller
{
    public function store(Request $request)
    {
        $user = $request->all();
        dd($user);
        $us = User::create($user);
        return response()->json([
            "message" => "added",
            "User" => $us,
        ]);
    }

    public function update(Request $request, $id)
    {
        $userId = User::find($id);
        $user = $request->all();
        if ($user["password"] == "") {
            $userId["name"] = $user["name"];
            $userId["email"] = $user["email"];
            $userId->update();
            return response()->json(["data" => $userId]);
        } else {
            $userId["name"] = $user["name"];
            $userId["email"] = $user["email"];
            $userId["passwrd"] = $user["password"];
            $userId->update();
            return response()->json(["data" => $userId]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["message" => "deleted"]);
    }
}
