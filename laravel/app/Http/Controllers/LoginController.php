<?php

namespace App\Http\Controllers\Api\Auth;;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credebtuals = $request->validate([
         'email' => 'required|email',
         'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            return response()->json(['message' => 'OK!'], 200);
        }

        return response()->json(['message' => 'ユーザーが見つかりません。'], 422);
    }

}