<?php

namespace App\Http\Controllers\Web;

use Auth;
use Validator;
use App\Models\User;
use App\Models\Admin\Game;
use App\Models\Admin\Post;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Models\Admin\PageField;
use App\Models\Admin\GameDynamic;
use App\Http\Controllers\Controller;
use App\Models\Admin\GameDynamicUser;
use Illuminate\Support\Facades\Route;

class WebController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $games = Game::whereDate('match_date', '>=', \Carbon\Carbon::now()->toDateTimeString())->orderBy('match_date', 'Asc')->get();
        $posts = Post::where('draft', 0)->orderBy('order', 'Asc')->take(4)->get();
        $games_a = Game::whereHas('team1', function($q){
            $q->where('group', 'A');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_b = Game::whereHas('team1', function($q){
            $q->where('group', 'B');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games1 = Game::whereDate('match_date', '2022-11-29')->get();
        $games2 = Game::whereDate('match_date', '2022-11-30')->get();
        $users = User::where('role', 1)->orderBy('points_total', 'Desc')->get();
        return view('web.index', compact('agent', 'games', 'posts', 'games_a', 'games_b', 'users', 'games1', 'games2'));
    }

    public function games_result16()
    {
        $agent = new Agent();
        $games_a = Game::whereHas('team1', function($q){
            $q->where('group', 'A');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_b = Game::whereHas('team1', function($q){
            $q->where('group', 'B');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_c = Game::whereHas('team1', function($q){
            $q->where('group', 'C');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_d = Game::whereHas('team1', function($q){
            $q->where('group', 'D');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_e = Game::whereHas('team1', function($q){
            $q->where('group', 'E');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_f = Game::whereHas('team1', function($q){
            $q->where('group', 'F');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_g = Game::whereHas('team1', function($q){
            $q->where('group', 'G');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_h = Game::whereHas('team1', function($q){
            $q->where('group', 'H');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        return view('web.games_result16', compact('agent', 'games_a', 'games_b', 'games_c', 'games_d', 'games_e', 'games_f', 'games_g', 'games_h'));
    }

    public function games_result8()
    {
        $agent = new Agent();
        $games = Game::where('phase', 'Octavos de final')->orderBy('match_date', 'Asc')->get();
        return view('web.games_result8', compact('agent', 'games'));
    }

    public function games_result4()
    {
        $agent = new Agent();
        $games = Game::where('phase', 'Cuartos de final')->orderBy('match_date', 'Asc')->get();
        return view('web.games_result4', compact('agent', 'games'));
    }

    public function games_result2()
    {
        $agent = new Agent();
        $games = Game::where('phase', 'Semifinales')->orderBy('match_date', 'Asc')->get();
        return view('web.games_result2', compact('agent', 'games'));
    }

    public function games_result1()
    {
        $agent = new Agent();
        $games = Game::where('phase', 'Final')->orderBy('match_date', 'Asc')->get();
        return view('web.games_result1', compact('agent', 'games'));
    }

    public function predictions16()
    {
        $games_a = Game::whereHas('team1', function($q){
            $q->where('group', 'A');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_b = Game::whereHas('team1', function($q){
            $q->where('group', 'B');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_c = Game::whereHas('team1', function($q){
            $q->where('group', 'C');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_d = Game::whereHas('team1', function($q){
            $q->where('group', 'D');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_e = Game::whereHas('team1', function($q){
            $q->where('group', 'E');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_f = Game::whereHas('team1', function($q){
            $q->where('group', 'F');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_g = Game::whereHas('team1', function($q){
            $q->where('group', 'G');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();
        $games_h = Game::whereHas('team1', function($q){
            $q->where('group', 'H');
        })->where('phase', 'Fase de grupos')->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        $pagefield = PageField::find(1);
        return view('web.predictions16', compact('pagefield', 'games_a', 'games_b', 'games_c', 'games_d', 'games_e', 'games_f', 'games_g', 'games_h', 'results_all'));
    }

    public function predictions8()
    {
        $games = Game::where('phase', 'Octavos de final')->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        $pagefield = PageField::find(1);
        return view('web.predictions8', compact('pagefield', 'games', 'results_all'));
    }

    public function predictions4()
    {
        $games = Game::where('phase', 'Cuartos de final')->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        $pagefield = PageField::find(1);
        return view('web.predictions4', compact('pagefield', 'games', 'results_all'));
    }

    public function predictions2()
    {
        $games = Game::where('phase', 'Semifinales')->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        $pagefield = PageField::find(1);
        return view('web.predictions2', compact('pagefield', 'games', 'results_all'));
    }

    public function predictions1()
    {
        $games = Game::where('phase', 'Final')->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        $pagefield = PageField::find(1);
        return view('web.predictions1', compact('pagefield', 'games', 'results_all'));
    }
    
    public function blog()
    {
        $agent = new Agent();
        $posts = Post::where('draft', 0)->orderBy('order', 'Asc')->get();
        return view('web.blog', compact('agent', 'posts'));
    }

    public function post($slug, $id)
    {
        $agent = new Agent();
        $post = Post::where('id', $id)->where('slug', $slug)->first();
        $related = Post::where('draft', 0)->where('id', '<>', $id)->get();
        return view('web.post', compact('agent', 'post', 'related'));
    }

    public function terms()
    {
        $agent = new Agent();
        $pagefield = PageField::find(1);
        return view('web.terms', compact('agent', 'pagefield'));
    }

    public function policy()
    {
        $agent = new Agent();
        $pagefield = PageField::find(1);
        return view('web.policy', compact('agent', 'pagefield'));
    }

    public function dynamics()
    {
        $agent = new Agent();
        $dynamics = GameDynamic::where('draft', 0)->orderBy('order', 'Asc')->get();
        return view('web.dynamics', compact('agent', 'dynamics'));
    }

    public function dynamic($slug, $id)
    {
        $agent = new Agent();
        $dynamic = GameDynamic::where('id', $id)->where('slug', $slug)->first();
        $related = GameDynamic::where('draft', 0)->where('id', '<>', $id)->get();
        $participated = GameDynamicUser::where('user_id', Auth::user()->id)->where('game_dynamic_id', $dynamic->id)->count();
        return view('web.dynamic', compact('agent', 'dynamic', 'related', 'participated'));
    }
}
