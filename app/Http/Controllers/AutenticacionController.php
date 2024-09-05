<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller
{
    public function logIn()
    {
        return view('auth/logIn');
    }

    public function logIning(Request $request)
    {
        $credenciales = $request->only(['password', 'email', 'editor']);
        if (!Auth::attempt($credenciales)) {
            return redirect('/logIn')->with('status', [
                'type' => 'error',
                'message' => 'Revise los datos ingresados.',
            ])->withInput();
        } elseif (Auth::user()->editor == 1) {
            return redirect('/admin/dashboard')->with('status', ['type' => 'success', 'message' => 'Bienvenido ' . Auth::user()->email]);
        } else {
            return redirect('/')->with('status', ['type' => 'success', 'message' => 'Bienvenido ' . Auth::user()->email]);
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registering(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
                ],
                [
                    'name.required' => 'El nombre es necesario.',
                    'name.min' => 'El nombre tiene un mínimo de dos caracteres.',
                    'password.required' => 'La contraseña es necesaria.',
                    'email.required' => 'El correo electrónico es necesario.',
                    'email.email' => 'El formato del correo electrónico no es válido.',
                    'email.unique' => 'El correo electrónico ya está registrado en nuestras bases de datos.',
                ]
            );
            $newUser = $request->only(['name', 'email', 'password']);
            $newUser['editor'] = false;
            DB::transaction(function () use ($request, $newUser) {
                $user = User::create($newUser);
            });
            return redirect('/logIn')->with('status', ['type' => 'success', 'message' => $newUser['name'] . ' te registraste con éxito.']);
        } catch (\Exception $e) {
            return redirect('/register')->with('status', ['type' => 'error', 'message' => 'No se pudo registrar usuario ' . $request['name'] . '. ' . $e->getMessage()])->withInput();
        }
    }


    public function logOuting(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', ['type' => 'success', 'message' => 'Adios']);
    }
}
