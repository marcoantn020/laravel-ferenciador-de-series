<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function index(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()
                ->json('Unauthorized', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token');

        return response()
            ->json(['tpken' => $token->plainTextToken]);
    }

    public function logout(Authenticatable $user)
    {
        $user->tokens()->delete();
        return response()
            ->json(['message' => 'Logout realizado com sucesso']);
    }
}
