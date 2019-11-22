<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use User;
use App\Consumable;
use App\Restaurant;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, request $request)
    {
        $user = Auth::user();
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        $restaurants = $user->restaurants;
        return view('consumables.create', ['id' => $id], compact('restaurant','restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id)
    {
        request()->validate([
            'title' => ['required', 'string', 'max:191'],
            'category' => ['required', 'numeric'],
            'photo' => ['required', 'image'],
            'price' => ['required', 'numeric'],
        ]);

        $originalImage = $request->file('photo');
        $cropped = Image::make($originalImage)
            ->fit(200, 200)
            ->encode('jpg', 80);
        $img_id = uniqid().'.jpg';
        $cropped->save('../storage/app/public/'.$img_id);

        $consumable = new Consumable();
        $consumable->title = $request->title;
        $consumable->category = $request->category;
        $consumable->price = $request->price;
        $consumable->photo = $img_id;
        $consumable->restaurant_id = $restaurant_id;
        $consumable->save();

        return redirect()->route('restaurants.show', ['restaurant' => $restaurant_id]);
    }
    
      /**
     * Display the specified resource.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function show($id, Consumable $consumable)
    {
        $consumable = Consumable::with('consumables')->find($id);
        return view('consumables.show', compact('consumable'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumables = Consumable::find($id);
        return view('consumables.edit', compact('consumable', 'consumables'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumable $consumable)
    {
        request()->validate([
            'title' => ['required', 'string', 'max:191'],
            'category' => ['required', 'numeric'],
            'photo' => ['required', 'image'],
            'price' => ['required', 'numeric'],
        ]);

/*        $consumable = Consumable::find($id);
*/        $consumable->title = $request->get('title');
        $consumable->category = $request->get('category');
        $consumable->photo = $request->get('photo');
        $consumable->price = $request->get('price');
        $consumable->save();
        return redirect()->route('restaurants.index')
                      ->with('success', 'consumable updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumable $consumable)
    {
        // Destroy the consumable with the given ID
        Consumable::destroy($consumable->id);
        return redirect()->back();
    }
}
