<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //


    public function show()
    {
        if (Auth::check()){
            return redirect('/homeG');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)){
            return redirect()->to('/')->withErrors('Usuario o contraseña incorrecto');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticate($request,$user);
    }

    public function authenticate(Request $request,$user)
    {
        if ($user->rol == 1) {
            return redirect('/admin');
        } elseif ($user->rol == 2) {
            return redirect('/homeG');
        } else {
            // Manejo para roles no reconocidos
            return redirect('/');
        }

    }

}
