<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //funcion pra mostrar login

    public function showLogin()
    {
        return view('login.showLogin');
    }

    public function login(Request $request)
    {
        //validacion
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required']
        ]);

        //autentica

        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {

            $request->session()->regenerate();
            $user = Auth::user();

            //redirigimos
            if ($user->role === 'administrador') {
                return redirect()->route('admin');
            } elseif ($user->role === 'cuidador') {
                return redirect()->route('cuidador');
            } else {
                return redirect()->route('veterinario');
            }
        } else {
            return back()->withErrors([
                'login' => 'Credenciales incorrectas'
            ])->onlyInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
