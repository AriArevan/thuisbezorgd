@extends('layouts.app')
@section('content')
        
        <div class="container">
            <div class="row">
              <div class="col-md-10">
                <h3>List of all restaurants</h3>
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
          <td>{{$restaurant->title}}</td>
          <td>{{$restaurant->phone}}</td>
          <td>
            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="post">
                <a class="btn btn-sm btn-success" href="{{route('restaurants.show',$restaurant->id)}}">Show</a>
                <a class="btn btn-sm btn-warning" href="{{route('restaurants.edit',$restaurant->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    @endforeach
    </tr>
</table>

            <div class="row">
              <div class="col-md-10">
                <h3>List of all users</h3>
            </div>
        </div>
 

        <table class="table table-hover table-sm">
          <tr>
            <th>id</th>
            <th width = "50px"><b>Name</b></th>
            <th width = "300px">Phonenumber </th>

            <th>options</th>

        </tr>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phonenumber}}</td>
            <td>
            <form action="{{ route('profile.destroy', $user->id) }}" method="post">
                <a class="btn btn-sm btn-primary" href="{{route('orders')}}">Orders</a>
                <a class="btn btn-sm btn-warning" href="{{route('profile.edit',$user->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    @endforeach
    </tr>
</table>


@endsection
