<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agora</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
  <div class="xx" id="xx">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm bg-white rounded">
            <div class="container">

                
                     @guest
                     <a class="navbar-brand" href="{{ url('/') }}">
                     @if (Route::has('register'))                   
                     @endif
                     @else
                     <a class="navbar-brand" href="{{ url('/home') }}"> 
                     @endguest


            
                    <img src="{{ asset('pict/123.jpg') }}" alt="fotoAgora" id="logoAgora" style="width:140px; height:55px;;">
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
                        @else  <!---#767474 color icocnos   -->

                                 <li class="nav-item" style="margin-right:40px; ">
                                     <a class="nav-link" href="{{ url('/home') }}"><img src=" {{asset('img/.png')}}" style="max-height:26px; "   ></a>
                                 </li>
                                 <li class="nav-item" style="margin-right:40px; ">
                                    <a class="nav-link" href="{{route('Vemployee')}}"><img src=" {{asset('img/workers-32.png')}}" style="max-height:25px; "   ></a>
                                </li>

                                <li class="nav-item"  style="margin-right:180px; ">
                                <a class="nav-link" href="{{route('favoriteProyect')}}"><img src=" {{asset('img/heart-69-48.png')}}" style="max-height:20px; "   ></a>
                                </li>
                                 <li class="nav-item">
                                     <a id="createProyect" class="nav-link" href="{{route('Cproject')}}">Crear Proyecto<img src=" {{asset('img/report-3-48.png')}}" style="max-height:20px; "   ></a>
                                 </li>
                            
                           
                            <li> &nbsp; &nbsp; &nbsp;</li>
                            <li>
                                <a  href="{{route('VPerfil')}}">      @include('includes.avatar')  </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                               
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" value=" {{$tipo=Auth::user()->tipo_user}}">
                                    <a class="dropdown-item" href="{{route('VPerfil')}}">Mi perfil</a>
                                    <a class="dropdown-item" href="{{route('Ctrabajador')}}">Mi perfil de trabajador</a>
                                    <a class="dropdown-item" href="{{route('config')}}">Modificar perfil</a>
                                    <a class="dropdown-item" href="{{route('Vproject')}}">Mis Proyectos</a>
                                   
                                    @if(  $tipo =='admin' )
                                    <a class="dropdown-item" href="{{route('dbmaster')}}">Admin</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
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
            <div>
                <div>
                    
                </div>
                @yield('content')

            </div>                   
        </main>
        <div class="xx">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        @include('includes.chiches.footer')
    </div>
    </div>
</div>
</body>

</html>
