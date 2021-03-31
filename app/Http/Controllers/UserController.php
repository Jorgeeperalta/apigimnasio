<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Request as IlluminateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return response()->json([
            'res' => true,
            'message' => 'se creo el usuario con exito!!'
        ], 200);
    }


    public function login(Request $request)
    {

        $user = User::whereEmail($request->email)->first();
        if (!is_null($user) && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('Access Token')->accessToken;
            $user->save();
            return response()->json([
                'res' => true,
                'token' => $token,
                'message' => $user
            ], 200);
        } else {
            return response()->json([
                'res' => true,
                'message' => $request
            ], 200);
        }
    }

    public function logout()
    {
        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res' => true,
            'message' => 'Cierra'
        ], 200);
    }
}
