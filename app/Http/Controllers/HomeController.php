<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Model;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function feed() {
        $models = [];
        foreach(Follower::where('follower', auth()->user()->id)->get() as $following) {
            array_push($models, new Model($following->followee));
        }
        return view('feed')->with('models', $models);
    }
}
