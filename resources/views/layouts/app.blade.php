
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>{{ config('app.name', 'Forum') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
 @foreach($channels as $channel)
<div id="mySidenav" class="sidenav">
  <a href="/threads/{{$channel->slug}}" class=" {{$channel->slug}} w3-bar-item w3-button"><i></i>{{$channel->name}}</a>
</div>
@endforeach
<div id="mySidenav">
  <a href="/threads/create" class="ask-button w3-bar-item w3-button"><i class="fa fa-comment"></i></a>
</div>

<div class="w3-container">
<div id="app">
<div class="w3-bar w3-light-grey w3-border w3-large navbar-fixed-top">
  <a href="/threads" class="w3-bar-item w3-button w3-black"><i class="fa fa-home"></i></a>
  <a href="/threads?popular=1" class="w3-bar-item w3-button"><i class="fa fa-heart"></i></a>
  @if(auth()->check())
  <a href="/threads?by={{auth()->user()->name}}" class="w3-bar-item w3-button"><i>my</i></a>
  <a href="{{route('profile', auth()->user()->name)}}" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
  <a href="/threads/create" class="w3-bar-item w3-button"><i class="fa fa-comment"></i></a>
 @endif
 @if(Auth::guest())
  <a href="{{ route('login') }}" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i></a>
  <a href="{{ route('register') }}" class="w3-bar-item w3-button"><i>register</i></a>
  @else

<a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    
    {{ csrf_field() }}
  </form>

  @endif
</div>

        @yield('content') 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>
</html>
