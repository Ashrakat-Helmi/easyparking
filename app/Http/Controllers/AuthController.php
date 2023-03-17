<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            "email" => 'required|string|unique:users',
            "password" => "required|string|confirmed"
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'img' => $fields['img'],
            'phone' => $fields['phone'],
            'password' =>bcrypt( $fields['password'])
        ]);
        $token = $user->createToken("myToken")->plainTextToken;
        $response = [
            'user' => $user,
            "myToken" => $token
        ];
        return response($response, 201);

    }
    public function login(Request $request){
        $fields = $request->validate([
            "phone" => 'required|string',
            "password" => "required|string"
        ]);
        $user = User::where('phone', $fields['phone'])->first();
        if(! $user|| !Hash::check($fields['password'],$user->password)){
            return response([
                "message" => "bad login"
            ], 401);
        }
        $token = $user->createToken("myToken")->plainTextToken;

        $response = [
            'user' => $user,
            "myToken" => $token
        ];
        return response($response, 201);

    }
    public function logout(Request $request){ 
        auth()->user()->tokens()->delete();
        return [
            "message" => "Logged out"
        ];
     }
}
