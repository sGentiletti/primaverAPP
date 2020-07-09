<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'primaverAPP') }}</title>

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'primaverAPP') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                        @endif --}}
                        @else
                        <li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contacto">Contacto</a>
                            </li>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->is_admin == 1)
                                <a class="dropdown-item" href="/adminpanel">
                                    Panel de Administración
                                </a>
                                @else
                                <a class="dropdown-item" href="/perfil">
                                    Perfil
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
            <div class="container">
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Atención secretaría:</h4>
                        <p>Recuerden que al momento de ingresar una dirección de email la misma <strong>debe existir</strong>. Recomendamos uso de dominios conocidos como gmail.com, hotmail.com, outlook.com, yahoo.com, etc. y revisar la carpeta de <b>spam</b> en caso de que no los reciban (y marcar los mismos como no spam).</p>
                        <p>Como alternativa pueden usar <a target="_blank" href="http://www.emailtemporalgratis.com/#/gustr.com/Flaul1928/">emails temporales</a>, recuerden que si utilizan este servicio los correos pueden demorar hasta 2 minutos en mostrarse en la web, no es necesario refrescar la página.</p>
                        <hr>
                        <p class="mb-0">Te regalamos una galletita por tu tiempo 🍪 <br>Att: Equipo de SeJu Digital.</p>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>

<script>
    var $buoop = {
        required: {
            e: -4,
            f: -3,
            o: -3,
            s: -1,
            c: -3
        },
        insecure: true,
        api: 2020.06
    };

    function $buo_f() {
        var e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {
        document.addEventListener("DOMContentLoaded", $buo_f, false)
    } catch (e) {
        window.attachEvent("onload", $buo_f)
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>

</html>
