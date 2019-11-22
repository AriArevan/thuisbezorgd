@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h3>Edit restaurant</h3>
      <div class="col-sm-2">
      <h2><a class="btn btn-sm btn-primary" href="{{route('consumables.create', ['restaurant_id' => $restaurants->id])}}">Add consumables</a></h2>
    </div>
    </div>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops! </strong> there where some problems with your input.<br>
    <ul>
      @foreach ($errors as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{route('restaurants.update',$restaurants->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <strong>title :</strong>
        <input type="text" name="title" class="form-control" value="{{$restaurants->title}}">
      </div>
      <div class="col-md-12">
        <strong>Kamer van Koophandel :</strong>
        <input type="text" name="kvk" class="form-control" value="{{$restaurants->kvk}}">
      </div>
      <div class="col-md-12">
        <strong>address :</strong>
        <input type="text" name="address" class="form-control" value="{{$restaurants->address}}">
      </div>
      <div class="col-md-12">
        <strong>zipcode :</strong>
        <input type="text" name="zipcode" class="form-control" value="{{$restaurants->zipcode}}">
      </div>
      <div class="col-md-12">
        <strong>city :</strong>
        <input type="text" name="city" class="form-control" value="{{$restaurants->city}}">
      </div>
      <div class="col-md-12">
        <strong>phonenumber :</strong>
        <input type="text" name="phone" class="form-control" value="{{$restaurants->phone}}">
      </div>
      <div class="col-md-12">
        <strong>open :</strong>
        <input type="text" name="open" class="form-control" value="{{$restaurants->open}}">
      </div>
      <div class="col-md-12">
        <strong>close :</strong>
        <input type="text" name="close" class="form-control" value="{{$restaurants->close}}">
      </div>
      <div class="col-md-12">
        <strong>email :</strong>
        <input type="email" class="form-control" name="email" value="{{$restaurants->email}}">
      </div>


      <div class="col-md-12">
        <a href="{{route('restaurants.index')}}" class="btn btn-sm btn-success">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection