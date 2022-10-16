<?php

namespace App\Http\Controllers\Web;

use Auth;
use Hash;
use Validator;
use App\Models\User;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function index()
    {
        return view('web.login.index');
    }

    public function login(Request $request)
    {
        $rules=[
            'email' => 'required',
            'password' => 'required',
        ];

        $messages=[
            'email.required' => 'Su email electrónico es requerido',
            //'email.email' => 'El formato de su correo electrónico es invalido',
            'password.required' => 'Por favor escriba una contraseña',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $user_login = explode('-', $request->email);
            if(count($user_login) >= 2):
                if(strlen($user_login[1]) == 0):
                    return response()->json(['success' => false]);
                endif;
                if(Auth::attempt(['id' => $user_login[1], 'password' => $request->password], true)):
                    if(Auth::user()->role == 0):
                        return response()->json(['success' => true, 'ruta' => 'myaccount/profile']);
                    endif;
                    return response()->json(['success' => true, 'ruta' => 'myaccount/profile']);
                else:
                    return response()->json(['success' => false]);
                endif;
            endif;
            
            if(count($user_login) <= 1):
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)):
                    if(Auth::user()->role == 0):
                        return response()->json(['success' => true, 'ruta' => 'myaccount/profile']);
                    endif;
                    return response()->json(['success' => true, 'ruta' => 'myaccount/profile']);
                else:
                    return response()->json(['success' => false]);
                endif;
            endif;
        endif;
    }

    public function create()
    {
        return view('web.login.create');
    }

    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];

        $messages=[
            'name.required' => 'El nombre es obligatorio',
            'lastname.required' => 'El apellido es obligatorio',
            'birthday.required' => 'Ingrese su cumpleaños',
            'email.required' => 'Ingrese su email',
            'email.unique' => 'El email ya se encuentra en uso',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $request->merge(['password' => Hash::make($request->password)]);
            $request->merge(['role' => 1]);
            $request->merge(['avatar' => 'avatar.png']);
            $recorded = User::create($request->all());
            return back()->with('message', 'Usuario creado con éxito.')->with('typealert', 'success');
        endif;
    }

    public function edit($id)
    {
        $user = User::find($id);
        $supervisors = User::where('role','1')->get()->pluck('full_name','id')->prepend('Selecciona un supervisor', NULL)->toArray();

        return view('admin.login.edit', compact('user', 'supervisors'));
    }

    public function update(Request $request, $id)
    {
        $rules=[
            'password' => 'required',
            'newpassword' => 'required|min:8',
            'renewpassword' => 'required|min:8|same:newpassword',
        ];

        $messages=[
            'password.required' => 'Por favor escriba su contraseña',
            'newpassword.required' => 'Por favor escriba su nueva contraseña',
            'renewpassword.required' => 'Por favor escriba nuevamente su nueva contraseña',
            'newpassword.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'renewpassword.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'renewpassword.same' => 'Las contraseñas no coinciden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $user=User::find(Auth::user()->id);
            if(Hash::check($request->password, Auth::user()->password)):
                $user->password=Hash::make($request->newpassword);
                $user->save();
                return back()->with('message', 'Contraseña actualizada con éxito')->with('typealert', 'success');
            else:
                return back()->withErrors($validator)->with('message', 'La contraseña ingresada no coincide')->with('typealert', 'danger')->withInput();
            endif;
        endif;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function getForget()
    {
        return view('web.login.forget');
    }

    public function postForget(Request $request)
    {
        $rules=[
            'email' => 'required|email|exists:users',
        ];

        $messages=[
            'email.required' => 'Ingrese el email',
            'email.email' => 'Ingrese un email correcto',
            'email.exists' => 'El email no existe en nuestra base de datos',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $token = Str::random(64);
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );

            $data = $request->all();
            $email = $request->email;
            $data['name'] = ucfirst(User::where('email', $email)->first()->name);
            $data['token'] = $token;
            Mail::send('web.emails.forget', $data, function($message) use ($email, $data)
            {
                $message->to($email)->subject($data['name'].', ¿Olvidaste tu contraseña?');
            });
            return redirect()->route('login.index')->with('message', 'Hemos enviado un enlace para restablecer la contraseña al email: '.$email.' Si no lo recibes en unos minutos, revisa tu carpeta de spam.')->with('typealert','success');
        endif;
    }

    public function getReset($token)
    {
        $email = DB::table('password_resets')->where('token', $token)->get();
        if(count($email) == 0):
            $variable = 'No existe el link ingresado';
            return view('web.login.reset', compact('variable'));
        endif;
        $email = DB::table('password_resets')->where('token', $token)->first()->email;
        $token_last = DB::table('password_resets')->where('email', $email)->orderBy('created_at', 'Desc')->first()->token;
        if($token != $token_last):
            $variable = 'La url ya no se encuentra activa';
            return view('web.login.reset',compact('variable'));
        else:
            $variable = 1;
            return view('web.login.reset',compact('variable', 'email'));
        endif;
    }

    public function postReset(Request $request)
    {
        $rules=[
            'newpassword'=>'required|min:6',
            'renewpassword'=>'required|min:6|same:newpassword',
        ];

        $messages=[
            'newpassword.required'=> 'Por favor escriba su nueva contraseña',
            'renewpassword.required'=> 'Por favor escriba nuevamente su nueva contraseña',
            'newpassword.min'=> 'La nueva contraseña debe tener al menos 6 caracteres',
            'renewpassword.min'=> 'La nueva contraseña debe tener al menos 6 caracteres',
            'renewpassword.same'=> 'Las contraseñas no coinciden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return redirect()->route('login.index')->with('message','Contraseña actualizada con éxito')->with('typealert','success');
        endif;
    }
}
