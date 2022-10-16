<?php

namespace App\Http\Controllers\Web;

use Str;
use Auth;
use Hash;
use Storage;
use Validator;
use App\Models\User;
use Jenssegers\Agent\Agent;
use App\Models\Admin\Result;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ProfileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index()
    {
        $countries = [
            '' => 'Selecciona tu país',
            'Perú' => 'Perú',
            'Colombia' => 'Colombia',
        ];

        $genders = [
            '' => 'Seleccione su género',
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
        ];

        $type_document = [
            '' => 'Seleccione su tipo de documento',
            'DNI' => 'DNI',
            'Pasaporte' => 'Pasaporte',
            'Carnet de extranjería' => 'Carnet de extranjería',
        ];

        return view('web.profile.index', compact('countries', 'genders', 'type_document'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'newpassword' => 'nullable|min:8',
            'renewpassword' => 'nullable|min:8|same:newpassword',
            'birthday' => 'required',
        ];

        $messages=[
            'name.required' => 'Ingresa tu nombre',
            'lastname.required' => 'Ingresa tu apellido',
            'newpassword.min'=> 'La nueva contraseña debe tener al menos 8 caracteres',
            'renewpassword.min'=> 'La nueva contraseña debe tener al menos 8 caracteres',
            'renewpassword.same'=> 'Las contraseñas no coinciden.',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if(Auth::user()->id <> $id):
                return back()->withErrors($validator)->with('message', '¿Qué haces? o.O')->with('typealert', 'danger')->withInput();
            endif;

            if($request->newpassword && $request->renewpassword):
                if($request->newpassword === $request->renewpassword):
                    $request->merge(['password' => Hash::make($request->newpassword)]);
                else:
                    return back()->withErrors($validator)->with('message', 'La contraseñas no coinciden')->with('typealert', 'danger')->withInput();
                endif;
            endif;

            if($request->hasFile('avatar_front')):
                if($request->file('avatar_front')->isValid()):
                    $image = $request->file('avatar_front');
                    $fileName = $image->getClientOriginalName();
                    $fileName = Str::slug(explode('.',  $fileName)[0]);
                    $fileExt = trim($image->getClientOriginalExtension());
                    $name = $fileName.'__'.time().'.'.$fileExt;
                    Storage::disk('profiles')->delete(Auth::user()->avatar);
                    Storage::disk('profiles')->put($name, file_get_contents($image));
                    $request->merge(['avatar' => $name]);
                    
                endif;
            endif;
            
            $user = User::find(Auth::user()->id);
            $user->fill($request->all())->save();
            return back()->with('message', 'Datos actualizados con éxito')->with('typealert', 'success');
        endif;
    }

    public function saveMyPrediction(Request $request)
    {
        $rules=[
            //
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $data = $request->except('_token');
            foreach($data['game_id'] as $i):
                if(Result::where('game_id', $i)->where('user_id', Auth::user()->id)->count() == 0):
                    $data_result['game_id'] = $i;
                    $data_result['user_id'] = Auth::user()->id;
                    $data_result['result1'] = $data['result1'][$i];
                    $data_result['result2'] = $data['result2'][$i];
                    Result::create($data_result);
                elseif(Result::where('game_id', $i)->where('user_id', Auth::user()->id)->count() == 1):
                    $update = Result::where('game_id', $i)->where('user_id', Auth::user()->id)->first();
                    $update->result1 = $data['result1'][$i];
                    $update->result2 = $data['result2'][$i];
                    $update->save();
                endif;
            endforeach;
            return back()->with('message', 'Predicción guardada con éxito')->with('typealert', 'success');
        endif;
    }
}
