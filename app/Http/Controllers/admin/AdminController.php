<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Consumable;
use App\Order;

class AdminController extends Controller
{
	public function index()
	{
		$users = User::all();
		$restaurants = Restaurant::all();

		return view('admin.index')->with(['users' => $users, 'restaurants' => $restaurants]);
	}

    public function showAllOrders()
    {
          $orders = Order::all();


             return view('admin.adminshoworders')
                 ->with('orders', $orders);
    }




    public function showOrders($id)
    {
          // Get the current logged in user with his restaurants and orders
          $restaurant = Restaurant::where('id', $id)->with('restaurants', 'orders')->get()[0];
          // Create an empty orders array
          $orders = [];
          if (count($restaurant->orders)) {
              foreach ($restaurant->orders as $key => $order) {
                  // Push the consumables of each order to the orders array
                  array_push($orders, Order::where('id', $order->id)->with('consumables')->get()[0]);
              }
          }


          return view('admin.adminshoworders',[
               'restaurant' => $restaurant,
               'orders' => $orders
           ]);


    }








    
}
