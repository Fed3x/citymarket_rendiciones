<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">   
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @auth
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Dashboard<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"  href="/rendiciones">Rendiciones</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administracion
                            </a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Institucion</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Infraestructura</a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Even More..</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                                <li class="dropdown-submenu"><a class="dropdown-item" href="#">another
                                                        level</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Perfiles y Usuarios</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a tabindex="-1" href="/usuarios">Usuarios</a></li>
                                        <li class="dropdown-item"><a href="/perfiles">Perfiles</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a tabindex="-1" href="#">Second level</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Even More..</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                                <li class="dropdown-submenu"><a class="dropdown-item" href="#">another
                                                        level</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a tabindex="-1" href="#">Second level</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Even More..</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                                <li class="dropdown-submenu"><a class="dropdown-item" href="#">another
                                                        level</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                        <li class="dropdown-item"><a href="#">4th level</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-item"><a href="#">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                        <li class="dropdown-item"><a href="#">Second level</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configuraciones
                            </a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Referencias</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Geograficos</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">Paises</a></li>
                                                <li class="dropdown-item"><a href="#">Departamentos</a></li>
                                                <li class="dropdown-item"><a href="#">Ciudades</a></li>
                                                <li class="dropdown-item"><a href="#">Barrios</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Admisiones</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">Tipos de Admision</a></li>
                                                <li class="dropdown-item"><a href="#">Sub Tipos de Admision</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Obras
                                                Sociales</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Instituciones</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Estados
                                                Civiles</a>
                                        </li>

                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Nacionalidades</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Tipos de
                                                Documentos</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Generos</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Diagnosticos</a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Organizacion</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Geograficos</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">Paises</a></li>
                                                <li class="dropdown-item"><a href="#">Departamentos</a></li>
                                                <li class="dropdown-item"><a href="#">Ciudades</a></li>
                                                <li class="dropdown-item"><a href="#">Barrios</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">Admisiones</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="#">Tipos de Admision</a></li>
                                                <li class="dropdown-item"><a href="#">Sub Tipos de Admision</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="/sitios">Sucursales</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="/distancias">Distancias</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Instituciones</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="/pruebas"> Pruebas SITIOS SQLSRV</a>
                                        </li>

                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Nacionalidades</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Tipos de
                                                Documentos</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1" href="infraestructura">Generos</a>
                                        </li>
                                        <li class="dropdown-item"><a tabindex="-1"
                                                href="infraestructura">Diagnosticos</a>
                                        </li>


                                    </ul>
                                </li>
                            </ul>

                        </li>
                    </ul>

                    <usuario-component :user="{{ auth()->user() }}"></usuario-component>

                </div>
                @endauth
            </div>


        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/1eda8b13cd.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
     --}}
</body>   

</html>