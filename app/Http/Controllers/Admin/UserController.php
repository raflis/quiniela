<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Validator;
use App\Models\User;
use App\Models\Admin\Result;
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

    public function generate_points()
     {
        User::orderBy('id', 'Asc')->update(['points1' => 0]);
        
        $results = Result::whereHas('game', function($q){
            $q->where('game_over', 1);
        })->get();

        foreach($results as $item):
            $user = User::find($item->user_id);
            if(($item->result1 == $item->game->score1) and ($item->result2 == $item->game->score2)): //marcador exacto
                $user->points1 += 3;
                $user->save();
            elseif(($item->result1 == $item->result2) and ($item->game->score1 == $item->game->score2)): //empate
                $user->points1 += 1;
                $user->save();
            elseif((($item->result1 - $item->result2) < 0) and (($item->game->score1 - $item->game->score2) < 0)): //ganador
                $user->points1 += 1;
                $user->save();
            elseif((($item->result1 - $item->result2) > 0) and (($item->game->score1 - $item->game->score2) > 0)): //ganador
                $user->points1 += 1;
                $user->save();
            endif;
        endforeach;

        $users = User::get();
        foreach($users as $ite):
            $ite->points_total = $ite->points + $ite->points1;
            $ite->save();
        endforeach;

        return redirect()->route('users.index')->with('message', 'Puntos actualizados con éxito.')->with('typealert', 'success'); 
     }
    
    public function index()
    {
        $users = User::orderBy('points', 'Desc')->paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'birthday' => 'required',
            'email' => 'unique:users,email',
            'country' => 'required',
            'position' => 'required',
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
        $user = User::find($id);
        $user->birthday = \Carbon\Carbon::parse($user->birthday)->format('Y-m-d');
        return view('admin.users.edit', compact('user'));
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
            'birthday' => 'required',
            'email' => 'unique:users,email,'.$id,
            'country' => 'required',
            'position' => 'required',
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $updated = User::find($id);
            if($request->newpassword):
                $request->merge(['password' => Hash::make($request->newpassword)]);
            endif;
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
