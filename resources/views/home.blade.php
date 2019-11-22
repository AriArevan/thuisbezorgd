@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
<form action="{{route('search')}}" method="get">
    @csrf
    <div class="input-group mb-5" >
        <input type="search" placeholder="Zoek restaurant"  class="form-control" name="search">
        <div class="input-group-prepend">
            <button type="submit"  type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
@foreach($restaurants as $restaurant)
<div class="card" style="width: 18rem; display:inline-block;">
  <img src="storage/app/public/{{$restaurant->photo}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $restaurant->title }}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="restaurants/{{@$restaurant->id}}" class="btn btn-primary">Go to restaurant</a>
  </div>
</div>
@endforeach
@endsection
