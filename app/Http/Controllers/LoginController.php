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

        $alumno = Alumno::where('codigo_alumno', $codigo)->first();
        if ($alumno) {
            $user = new User();
            $user->codigo_usuario = $codigo;
            $user->password = Hash::make($contrasena);
            $user->tipo = 'Alumno';

            // Asociar el alumno al users
            $user->alumno()->associate($alumno);
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }
        
        // Validando el codigo_profesor

        $profesor = Profesor::where('codigo_profesor', $codigo)->first();
        if ($profesor) {
            $user = new User();
            $user->codigo_usuario = $codigo;
            $user->password = Hash::make($contrasena);
            $user->tipo = 'Profesor';

            // Asociando el profesor con users
            $user->profesor()->associate($profesor);
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }

        // Validando el codigo_personal

        $personal = Personal::where('codigo_personal', $codigo)->first();
        if ($personal) {
            $user = new User();
            $user->codigo_usuario = $codigo;
            $user->password = Hash::make($contrasena);
            $user->tipo = 'Personal';

            // Asociando el personal con users
            $user->personal()->associate($personal);
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }

        $administrador = Administrador::where('codigo_administrador', $codigo)->first();
        if ($administrador) {
            $user = new User();
            $user->codigo_usuario = $codigo;
            $user->password = Hash::make($contrasena);
            $user->tipo = 'Administrador';
            
            // Asociando el administrador con users
            $user->administrador()->associate($administrador);
            $user->save();

            Auth::login($user);

            return redirect()->route('panel2');
        }
        
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
            } elseif ($user->tipo === 'Personal') {
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
