<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;


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
    public function index(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();

/*        $restaurants = Restaurant::where('is_open', '<', date('H:i:s'))         ->where('is_closed', '>', date('H:i:s'))->get();*/

        return view('home', compact('restaurants'));
    }
}
