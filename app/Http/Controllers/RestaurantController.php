<?php

namespace App\Http\Controllers;

use Auth;
use User;
use Image;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Consumable;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::first();
        return view('restaurants.index', compact('restaurants'));
                  
    }

    public function create()
    {
        return view('restaurants.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required',
          'kvk' => 'required',
          'address' => 'required',
          'zipcode' => 'required',
          'city' => 'required',
          'phone' => 'required',
          'open' => 'required',
          'photo' => 'required',
          'close' => 'required',
          'email' => 'required',
        ]);

        $originalImage = $request->file('photo');
        $cropped = Image::make($originalImage)->fit(150, 150)->encode('jpg', 80);
        $img_id = uniqid().'.jpg';
        $cropped->save('../storage/app/public/'.$img_id);

        $restaurant = new Restaurant();
        $restaurant->title = $request->title;
        $restaurant->kvk = $request->kvk;
        $restaurant->address = $request->address;
        $restaurant->zipcode = $request->zipcode;
        $restaurant->city = $request->city;
        $restaurant->phone = $request->phone;
        $restaurant->photo = $request->photo;
        $restaurant->open = $request->open;
        $restaurant->close = $request->close;
        $restaurant->email = $request->email;
        $restaurant->user_id = Auth::id();
        $restaurant->save();
        return redirect()->route('restaurants.index')
                        ->with('success', 'new restaurant created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::with('consumables')->find($id);
        $eten = $restaurant->consumables->where('category', 1);
        $drinken = $restaurant->consumables->where('category',2 );
        $bijgerechten = $restaurant->consumables->where('category', 3);
        $categories = [
          'eten' => $eten,
          'drinken' => $drinken,
          'bijgerechten' => $bijgerechten,
        ];
      
        return view('restaurants.show', compact('restaurant', 'categories'));

    }

    public function search(Request $request)
    {
        $search = $request['search'];
        $restaurants = Restaurant::where('title', 'like', '%'.$search.'%')->get();
        return view('restaurants.search', ['restaurants' => $restaurants, 'search' => $search]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurants = Restaurant::find($id);
        return view('restaurants.edit', compact('restaurant', 'restaurants'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'title' => 'required',
          'kvk' => 'required',
          'address' => 'required',
          'zipcode' => 'required',
          'city' => 'required',
          'phone' => 'required',
          'open' => 'required',
          'close' => 'required',
          'email' => 'required',
      ]);
      $restaurant = Restaurant::find($id);
      $restaurant->title = $request->get('title');
      $restaurant->kvk = $request->get('kvk');
      $restaurant->address = $request->get('address');
      $restaurant->zipcode = $request->get('zipcode');
      $restaurant->city = $request->get('city');
      $restaurant->phone = $request->get('phone');
      $restaurant->open = $request->get('open');
      $restaurant->close = $request->get('close');
      $restaurant->email = $request->get('email');
      $restaurant->save();
      return redirect()->route('restaurants.index')
                      ->with('success', 'restaurant updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->route('restaurants.index')
                        ->with('success', 'Biodata siswa deleted successfully');
    }
}
