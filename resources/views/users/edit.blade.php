@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="page-section">
                <div class="d-flex justify-content-between">
                    <h2 class="page-section-header">Edit profile</h2>
                    <h3><a class="btn btn-sm btn-success" href="{{ route('restaurants.create') }}">Create New restaurant</a></h3>
                </div>

                    <form action="{{ route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">phonenumber</label>
                            <input type="text" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="zipcode">zipcode</label>
                            <input type="text" name="zipcode" value="{{ old('zipcode', $user->zipcode) }}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>

                    </form>
            </div>
        </div>
    </div>
</div>
        @endsection
