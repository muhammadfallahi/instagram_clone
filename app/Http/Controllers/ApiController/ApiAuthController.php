<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function login(loginRequest $request)
    {

        if (!$token = auth('api')->attempt($request->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        

        return response()
        ->json([
            'message' => 'login successfully',
            'data' => [
                'token' => $token
            ]
        ]);

    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function me()
    {
        return auth('api')->user();
    }
}
