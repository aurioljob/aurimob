<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\loginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class authController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function dologin(loginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.properties.index'))->with('success', 'Vous etes connecte.');
        }
        return back()->withErrors(['email' => 'Identifiants invalides.'])
        ->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous etes deconnecte.');
    }
}
