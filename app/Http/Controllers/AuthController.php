<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ]);

    //     $token = auth()->login($user);

    //     return $this->respondWithToken($token);
    // }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        $av = auth('api')->user()['picture'];
        return response()->json([
            'av' => $av,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);    
    }

    public function verifytokens()
    {
        return response()->json(['message' => 'Verified']);
    }


}
