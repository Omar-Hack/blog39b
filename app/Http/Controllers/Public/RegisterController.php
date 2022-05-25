<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash, Validator};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout']);
    }

    public function index() {
        return view('Public.Sessions.Register');
    }
    Public function store(Request $request){

        $rules = [
            'name'                     => 'required|min:3|max:10',
            'email'                    => 'required||min:12|max:60|email|unique:users,email',
            'password'                 => 'required|min:8|max:20',
        ];

        $messages = [
            'name.required'            => 'Ingresa tu nombre',
            'name.min'                 => '3 caracteres como minimo',
            'name.max'                 => '10 caracteres como maximo',

            'email.required'           => 'Ingresa tu correo',
            'email.email'              => 'Tu correo no es valido',
            'email.unique'             => 'Este correo, se encuentra registrado',
            'email.min'                => '12 caracteres como minimo',
            'email.max'                => '60 caracteres como maximo',

            'password.required'        => 'Introduce tu contraseña',
            'password.min'             => '8 caracteres como minimo',
            'password.max'             => '20 caracteres como maximo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error, al guardar los campos');
        else:
            $user           = new User;
            $user->status   = '1';
            $user->name     = e($request->input('name') .'-'.Str::random(5));
            $user->image    = '/images/icon.png';
            $user->password = Hash::make($request->input('password'));
            $user->email    = e($request->input('email'));
            $user->save();
        endif;

        return redirect()->route('public.login.index')->with('success','usuario creado con exito');
    }
}
