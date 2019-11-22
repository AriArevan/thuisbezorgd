<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use File;
use Redirect;

class UserController extends Controller
{

	public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $user = User::findorFail(Auth::id());
        $user->name = $request->name;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->city = $request->city;
        $user->phonenumber = $request->phonenumber;
        $user->email = $request->email;

        $user->save();

        return Redirect::back();
    }

    public function store(Request $request){

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

}
