<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if (!Auth::attempt($request->only(['email','password']))) {
            return redirect()
                ->back()
                ->withErrors(['loginFail' => 'Usuario ou senha invalidos']);
        }

        return to_route('series.index');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return to_route('login');
    }
}
