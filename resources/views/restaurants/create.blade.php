@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New restaurant </h3>
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

<form action="{{route('restaurants.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-12">
      <strong>title :</strong>
      <input type="text" name="title" class="form-control" value="{{ old('title')}}" placeholder="title">
  </div>
  <div class="col-md-12">
      <strong>kvk :</strong>

      <input type="text" class="form-control" placeholder="kvk" name="kvk" value="{{ old('kvk')}}">
  </div>
  <div class="col-md-12">
      <strong>address :</strong>
      <input type="text" name="address" class="form-control" value="{{ old('address')}}" placeholder="address">
  </div>        
  <div class="col-md-12">
      <strong>zipcode :</strong>
      <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode')}}" placeholder="zipcode">
  </div>
  <div class="col-md-12">
        <strong>city :</strong>
        <input type="text" name="city" class="form-control" value="{{ old('city')}}" placeholder="city">
  </div>
  <div class="col-md-12">
      <strong>phone :</strong>
      <input type="text" name="phone" class="form-control" value="{{ old('phone')}}" placeholder="phone">
  </div>
    <div class="col-md-12">
      <strong>open :</strong>
      <input type="text" name="is_open" class="form-control" value="{{ old('is_open')}}" placeholder="open">
  </div>
    <div class="col-md-12">
      <strong>close :</strong>
      <input type="text" name="is_closed" class="form-control" value="{{ old('is_closed')}}" placeholder="close">
  </div>
  <div class="col-md-12">
      <strong>email :</strong>
      <input type="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="email">
  </div>
  <div class="col-md-12">
      <strong>Logo :</strong>
      <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
  </div>

  <div class="col-md-12">
      <a href="{{route('restaurants.index')}}" class="btn btn-sm btn-success">Back</a>
      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
  </div>
</div>
</form>

</div>
@endsection