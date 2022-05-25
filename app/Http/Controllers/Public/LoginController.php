<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Validator, Auth};

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('public.publications.show');
    }

    public function index() {
        return view('Public.Sessions.Login');
    }

    public function store(Request $request) {

        $rules = [
            'email'           => 'required|min:12|max:60|email|exists:users,email',
            'password'        => 'required|min:8|max:20',

        ];
        $messages = [
            'email.required'           => 'Ingresa tu correo',
            'email.exists'             => 'Tu correo no existe',
            'email.email'              => 'Tu correo no es valido',
            'email.min'                => '12 caracteres como minimo',
            'email.max'                => '60 caracteres como maximo',

            'password.required'        => 'Introduce una contraseña',
            'password.min'             => '8 caracteres como minimo',
            'password.max'             => '20 caracteres como maximo',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error en los siguientes campos');
        else:
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => '1'])):
                return redirect()->route('public.publications.show');
            else:
                return back()->with('error','Error, Usuario Suspendido');
            endif;
        endif;
    }

}
