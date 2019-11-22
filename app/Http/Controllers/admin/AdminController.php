<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Consumable;
class AdminController extends Controller
{
	public function index()
	{
		$users = User::all();
		$restaurants = Restaurant::all();

		return view('admin.index')->with(['users' => $users, 'restaurants' => $restaurants]);
	}



	public function update()
	{


	}


    
}
