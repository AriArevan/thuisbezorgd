@extends('layouts.app')

@section('content')
@foreach ($errors->all() as $message)
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@endforeach

<form action="{{route('consumables.store', ['restaurant_id' => $id])}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-12">
      <strong>title :</strong>
      <input type="text" name="title" class="form-control" value="{{ old('title')}}" placeholder="title">
  </div>
  <div class="col-md-12">
      <strong>price :</strong>

      <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price')}}">
  </div>
  <div class="col-md-12">
      <strong>category :</strong>
          <select name="category" id="categoryInput" class="form-control">
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