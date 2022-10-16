<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin\Game;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function dashboard()
    {
        $games = Game::count();

        return view('admin.dashboard.index', compact(
                                                    [
                                                        'games',
                                                    ]
                                                ));
    }
}
