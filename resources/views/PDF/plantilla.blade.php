
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://kit.fontawesome.com/1eda8b13cd.js"></script>


    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> --}}

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
<div class="container">
    <div style="padding-top: 5px;">
        <div class="row">
            <div class="col-3 text-left"><img src = "{{ asset('/img/logo.png') }}"  width="250" height="50"/>
            </div>
            <div class="col-6 text-center">
                <h1>Rendicion de Combustible</h1>
            </div>
            <div class="col-3 text-right">
                {{ \Carbon\Carbon::now()->format('d/m/Y')}} - {{ \Carbon\Carbon::now()->toTimeString()}}
            </div>
        </div>
    </div>
    <hr style="border: 1px solid black">
    
    <div>
        <div class="row">
            <div class="col-sm-4">
                Marca: Volkswagen
            </div>
            <div class="col-sm-4">
                Modelo: Gol
            </div>
            <div class="col-sm-4">
                Año: 2019  
            </div>
        </div>
    </div>
    <hr style="border: 1px solid black">
    <div class="text-center" style="overflow-x:auto;">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Monto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>PRV</td>
                    <td>CASA DE FEDE</td>
                    <td>18</td>
                    <td>18.890</td>
                </tr>

            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="row justify-content-around"" >
        <div class="col-3 text-center" style="border-top: 1px solid black">
            Federico Ariel Baez Villalba <br>
                4708532
        </div>
        <div class="col-3 text-center" style="border-top: 1px solid black">
            Pablo Cabral <br>
                1234567
        </div>
    </div>
</div>

</body>