<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Admin\Game;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
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
        $games = Game::orderBy('match_date', 'Asc')->where('phase', 'Fase de grupos')->paginate(24);
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('name', 'ASC')->where('name', '<>', 'Por definirse')->pluck('name', 'id');
        return view('admin.games.create', compact('teams'));
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
            'team1_id' => 'required',
            'team2_id' => 'required',
            'match_date' => 'required',
        ];

        $messages=[
            'team1_id.required' => 'Seleccione un equipo',
            'team2_id.required' => 'Seleccione un equipo',
            'match_date.required' => 'Ingrese la fecha del partido',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $recorded = Game::create($request->all());
            return redirect()->route('games.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
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
        $teams = Team::orderBy('name', 'ASC')->where('name', '<>', 'Por definirse')->pluck('name', 'id');
        $game = Game::find($id);
        return view('admin.games.edit', compact('game', 'teams'));
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
            //'team1_id' => 'required',
            //'team2_id' => 'required',
            //'match_date' => 'required',
            'score1' => 'required',
            'score2' => 'required',
        ];

        $messages=[
            'team1_id.required' => 'Seleccione un equipo',
            'team2_id.required' => 'Seleccione un equipo',
            'match_date.required' => 'Ingrese la fecha del partido',
            'score1.required' => 'Ingrese el resultado del equipo 1',
            'score2.required' => 'Ingrese el resultado del equipo 2',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $updated = Game::find($id);
            $updated->fill($request->all())->save();
            return redirect()->route('games.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $destroyed = Game::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert','success');
    }
}
