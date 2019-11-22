@extends('layouts.app')

@section('content')
<div class="container">
	<h4>U heeft gezocht voor <strong>{{$search}}</strong></h4>
	<div class="restaurants">
	    @foreach($restaurants as $restaurant)
	        <a href="{{route('restaurants.show', ['restaurant' => $restaurant->id])}}" class="btn btn-primary">
	            <h2  style="font-weight: bold;">{{$restaurant->title}}</h2>
	            <h4 class="restaurantaddress">{{$restaurant->address}}, {{$restaurant->city}}</h4>
	        </a>	
	    @endforeach
        <a href="{{route('home')}}" class="btn btn-sm btn-success">Back</a>
	</div>
</div>
@endsection