@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h3>Edit restaurant</h3>
      <div class="col-sm-2">
      <h2><a class="btn btn-sm btn-primary" href="{{route('consumables.create')}}">Add consumables</a></h2>
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

  <form action="{{route('consumables.update',$consumables->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <strong>title :</strong>
        <input type="text" name="title" class="form-control" value="{{$consumables->title}}">
      </div>
      <div class="col-md-12">
        <strong>Price :</strong>
        <input type="number" name="price" class="form-control" value="{{$consumables->price}}">
      </div>
      <div class="col-md-12">
        <strong>category :</strong>
            <select name="category" id="categoryInput" class="form-control" value="{{$consumables->category}}">
              <option value="1">Eten</option>
              <option value="2">Drinken</option>
              <option value="3">Bijgerecht</option>
          </select>
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