<?php

namespace App\Http\Controllers\Web;

use Auth;
use Validator;
use App\Models\Admin\Game;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class WebController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        return view('web.index', compact('agent'));
    }

    public function predictions()
    {
        $games_a = Game::whereHas('team1', function($q){
            $q->where('group', 'A');
        })->orderBy('match_date', 'Asc')->get();
        $games_b = Game::whereHas('team1', function($q){
            $q->where('group', 'B');
        })->orderBy('match_date', 'Asc')->get();
        $games_c = Game::whereHas('team1', function($q){
            $q->where('group', 'C');
        })->orderBy('match_date', 'Asc')->get();
        $games_d = Game::whereHas('team1', function($q){
            $q->where('group', 'D');
        })->orderBy('match_date', 'Asc')->get();
        $games_e = Game::whereHas('team1', function($q){
            $q->where('group', 'E');
        })->orderBy('match_date', 'Asc')->get();
        $games_f = Game::whereHas('team1', function($q){
            $q->where('group', 'F');
        })->orderBy('match_date', 'Asc')->get();
        $games_g = Game::whereHas('team1', function($q){
            $q->where('group', 'G');
        })->orderBy('match_date', 'Asc')->get();
        $games_h = Game::whereHas('team1', function($q){
            $q->where('group', 'H');
        })->orderBy('match_date', 'Asc')->get();

        $results_all = [];
        $results = Auth::user()->results;
        foreach($results as $r):
            $var = [
                    'result1' => $r->result1,
                    'result2' => $r->result2,
            ];
            $results_all['game_'.$r->game_id] = $var;
        endforeach;
        return view('web.predictions', compact('games_a', 'games_b', 'games_c', 'games_d', 'games_e', 'games_f', 'games_g', 'games_h', 'results_all'));
    }
    
    public function blog()
    {
        $agent = new Agent();
        $posts = Post::orderBy('order', 'asc')->get();
        $pagefield = PageField::find(1);
        return view('web.blog', compact('agent', 'posts', 'pagefield'));
    }

    public function post($slug, $id)
    {
        $agent = new Agent();
        $post = Post::where('id', $id)->where('slug', $slug)->first();
        $posts = Post::where('id', '<>', $id)->get();
        return view('web.post', compact('agent', 'post', 'posts'));
    }
}
