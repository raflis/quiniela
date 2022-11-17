<?php

namespace App\Http\Controllers\Admin;

use Str;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\GameDynamicUser;

class GameDynamicUserController extends Controller
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
    public function index()
    {
        $game_dynamic_users = GameDynamicUser::orderBy('id', 'Asc')->paginate();
        return view('admin.game_dynamic_users.index', compact('game_dynamic_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            //
        ];

        $messages=[
            //
        ];

        //
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
        $game_dynamic_user = GameDynamicUser::find($id);
        return view('admin.game_dynamic_users.edit', compact('game_dynamic_user'));
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
            'validate' => 'required',
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $updated = GameDynamicUser::find($id);

            if($request->validate == 1):
                $user_updated = User::find($updated->user_id);
                $user_updated->points += $updated->game_dynamic->points;
                $user_updated->save();
            endif;
            if($request->validate == -1):
                if($updated->updated_at != $updated->created_at):
                    $user_updated = User::find($updated->user_id);
                    $user_updated->points -= $updated->game_dynamic->points;
                    $user_updated->save();
                endif;
            endif;

            $updated->fill($request->all())->save();

            return redirect()->route('game_dynamic_users.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $destroyed = GameDynamicUser::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert','success');
    }
}
