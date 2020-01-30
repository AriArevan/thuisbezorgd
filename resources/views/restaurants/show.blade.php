<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " style="background-color: orange !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Thuisbezorgd
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{URL::to('profile')}}/{{Auth::user()->id}}/edit">Edit Account</a>

                                    <a class="dropdown-item" href="{{ route('ordersshow')}}">My Orders</a>

                                    <a class="dropdown-item" href="{{ route('restaurants.index')}}">My restaurants</a>

                                    @if(Auth::user()->is_admin == 1)
                                    <a class="dropdown-item" href="{{ route('admin.index')}}">Admin Panel</a>
                                    @endif
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Restaurant Detail</h3>
         @if (Auth::id() == $restaurant->user_id)
{{--         <a class="btn btn-sm btn-success" href="{{ route('consumables.create', ['restaurant_id' => $restaurant->id])}}">Add consumable</a> --}}
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

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

@foreach ($categories as $category => $cat)
    <hr/>
    <div class="row">

      @foreach ($cat as $c)
        <div class="col-md-4 mt-4">
          <h4 class="row justify-content-md-center">{{ $category }}</h4>
          <div class="card" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">{{$c->title}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">€{{$c->price}}</li>
                @if (Auth::id() == $restaurant->user_id)
            
                  <li class="list-group-item">
                      <form class="delete" method="POST" action="{{ route('consumables.destroy', $c->id) }}">
                        <a href="{{route('consumables.edit', $c->id)}}" class="btn btn-info">edit</a>
                        @csrf
                          @method('DELETE')

                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                  </li>
                
                  @endif
            <a href="{{Route('cart.add', ['id' => $c->id])}}" class="add-to-cart btn btn-primary" type="button" class="btn btn-primary btn-sm">Order</a>
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
    <div class="cart" style="border: 1px solid black; width: 400px; float:right; background-color:white;">
  <ul id="inner-cart">

 

  </ul>
  <a href="{{Route('pay', ['restaurant_id' => $restaurant->id])}}" class="btn btn-primary">Afrekenen</a>
    </div>
    </div>
  <script type="text/javascript">
  $('.add-to-cart').click(function(event) {
          event.preventDefault();
          id = $(this).prop('id')
          $.ajax({
              url: $(this).prop('href'),
              type: "GET",
          }).done(function(data) {
              console.log(data);
              $('#inner-cart').append('<li class="list-group-item">'+data+'</li>')
          });
      });

 

</script>
