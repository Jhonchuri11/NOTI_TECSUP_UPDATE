<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Personal;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
        $rules = [
            'codigo_usuario' => 'required',
            'password' => 'required|min:8'
        ];
        $messages = [
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener más de 8 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        // Validar los datos
        $codigo = $request->input('codigo_usuario');
        $contrasena = $request->input('password');

        $this->validate($request, $rules, $messages);

        if (User::where('codigo_usuario', $codigo)->exists()) {
            return back()->withErrors([
                'codigo_usuario' => 'El codigo ya esta en uso'
            ])->onlyInput('codigo_usuario');
        }

        /// Creamos un nuevo usuario
        $user = new User();
        $user->codigo_usuario = $codigo;
        $user->password = Hash::make($contrasena);

        $user->save();

        Auth::login($user);

        return redirect()->route('home');
        
        return back()->withErrors([
            'codigo_usuario' => 'El codigo utilizado no se encuentra'
        ])->onlyInput('codigo_usuario');
        
    }
    public function login(Request $request)
    {
        $rules = [
            'codigo_usuario' => 'required',
            'password' => 'required'
        ];
        
        $this->validate($request, $rules);

        //Validar datos
        $credentials = [
            'codigo_usuario' => $request->codigo_usuario,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->tipo === 'Alumno') {
                return redirect()->route('home')->with('success', 'success');
            } elseif ($user->tipo === 'Profesor') {
                return redirect()->route('home')->with('success', 'success');
            } elseif ($user->tipo === 'Administrador') {
                return redirect()->route('panel2')->with('success', 'success');
            }
        }

        return back()->withErrors([
            'codigo_usuario' => 'El codigo de usuario o contraseña incorrectos',
        ]);
    }

    public function logout(Request $request)
    {
        //

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
