<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Province;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProvinces(Request $request)
    {
        $provinces = Province::where('department_id', $request->id)->get();
        return $provinces;
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('province_id', $request->id)->get();
        return $districts;
    }
    
    public function index()
    {
        $users = User::where('membership', '<>', 'none')->orderBy('id','Desc')->paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $partner_type = [
            '' => 'Tipo de socio',
            'Activo' => 'Activo',
            'Excluido' => 'Excluido',
            'Fallecido' => 'Fallecido',
            'Honorario' => 'Honorario',
            'Vitalicio' => 'Vitalicio',
        ];
        $departments = Department::get();
        return view('admin.users.create', compact('genders', 'type_document', 'departments', 'partner_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'type_document' => 'required',
            'document' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'email' => 'nullable|unique:users,email',
            'birth_department' => 'required',
            'birth_province' => 'required',
            'birth_district' => 'required',
            'department' => 'required',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
            'partner_type' => 'required',
            'password' => 'required',
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $request->merge(['password' => Hash::make($request->password)]);
            $recorded = User::create($request->all());
            return redirect()->route('users.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $partner_type = [
            '' => 'Tipo de socio',
            'Activo' => 'Activo',
            'Excluido' => 'Excluido',
            'Fallecido' => 'Fallecido',
            'Honorario' => 'Honorario',
            'Vitalicio' => 'Vitalicio',
        ];
        $departments = Department::get();
        $user = User::find($id);
        $user->birthday = \Carbon\Carbon::parse($user->birthday)->format('Y-m-d');
        return view('admin.users.edit', compact('user', 'genders', 'type_document', 'partner_type', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illum   inate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'type_document' => 'required',
            'document' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'email' => 'nullable|unique:users,email',
            'birth_department' => 'required',
            'birth_province' => 'required',
            'birth_district' => 'required',
            'department' => 'required',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
            'partner_type' => 'required',
            'password' => 'required',
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $updated = User::find($id);
            $request->merge(['password' => Hash::make($request->password)]);
            $updated->fill($request->all())->save();
            return redirect()->route('users.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyed = User::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert','success');
    }
}
