@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Restaurant Detail</h3>
         @if (Auth::id() == $restaurant->user_id)
        <a class="btn btn-sm btn-success" href="{{ route('consumables.create', ['restaurant_id' => $restaurant->id])}}">Add consumable</a>
        @endif
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Restaurant : </strong> {{$restaurant->title}}
        </div>
      </div>
            <div class="col-md-12">
        <div class="form-group">
          <strong>Address: </strong> {{$restaurant->address}}
        </div>
      </div>
            <div class="col-md-12">
        <div class="form-group">
          <strong>Zipcode : </strong> {{$restaurant->zipcode}}
        </div>
      </div>
            <div class="col-md-12">
        <div class="form-group">
          <strong>City : </strong> {{$restaurant->city}}
        </div>
      </div>
            <div class="col-md-12">
        <div class="form-group">
          <strong>phonenumber : </strong> {{$restaurant->phone}}
        </div>
      </div>
{{--   <div class="card" style="width: 18rem; display:inline-block;">
  <div class="card-body">
    <h5 class="card-title">{{ $consumable->title }}</h5>
    <p class="card-text">Price: €{{$consumable->price}} </p>
  </div>
</div> --}}
@foreach ($categories as $category => $cat)
    <hr/>
    <h4 class="row justify-content-md-center">{{ $category }}</h4>
    <div class="row">

      @foreach ($cat as $c)
        <div class="col-md-4 mt-4">
          <div class="card" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">{{$c->title}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">€{{$c->price}}</li>
                            @if (Auth::id() == $restaurant->user_id)
                <form class="delete" method="POST" action="{{ route('consumables.destroy', $c->id) }}">
                  @csrf
                  @method('DELETE')
                  <li class="list-group-item">
                    <a href="{{route('consumables.edit', $c->id)}}">
                      <button type="button" class="btn btn-info">edit</button>
                    </a>
                    <button type="submit" class="btn btn-danger">Remove</button>
                  </li>
                </form>
              @endif
            </ul>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
      <div class="col-md-12">
        <a href="{{route('home')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection