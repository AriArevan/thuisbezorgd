@extends('layouts.app')
@section('content')
        
        <div class="container">
            <div class="row">
              <div class="col-md-10">
                <h3>List of your restaurants</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('restaurants.create') }}">Create New restaurant</a>
            </div>
        </div>
 
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>Name</b></th>
            <th width = "300px">Phonenumber </th>
            <th>options</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
          <td>{{$restaurants->title}}</td>
          <td>{{$restaurants->phone}}</td>
          <td>
            <form action="{{ route('restaurants.destroy', $restaurants->id) }}" method="post">
                <a class="btn btn-sm btn-success" href="{{route('restaurants.show',$restaurants->id)}}">Show</a>
                <a class="btn btn-sm btn-warning" href="{{route('restaurants.edit',$restaurants->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    @endforeach
    </tr>
</table>
@endsection
