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
<style>
        body{
            font-size: 70%;
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 7%;
            width: 100%;
        }
    </style>
        
</head>
<body background="white">
<header>
        <div style="padding-top: 5px;">
                <div class="row">
                    <div class="col-3 text-left" style="padding-bottom: 20px"><img src = "{{ asset('/img/logo.png') }}"  width="250" height="50"/>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                            <h1>Rendicion de Gastos de Movilidad</h1>
                    </div>
                </div>
            </div>

            <hr style="border: 1px solid black; margin:3px">
    
            <div>
                <div class="row" style="padding-top: 0px; padding-bottom: 0px;margin:0px">
                    <div class="col-12 text-left" style="padding-top: 5px">
                        <h5>&nbsp;<b>Datos del Vehiculo:</b></h5> 
                    </div>
                </div>
                <div class="row text-center" style="padding-top: 0px; padding-bottom: 0px;">
                    <table class="table table-sm table-borderless" style=" margin:0px;">
                        <tbody>
                            <tr>
                                <td class="col-3">Marca: <b>{{$flota->auto_marca->descripcion ?? 'No asignado'}}</b></td>
                            <td class="col-3">Modelo: <b>{{$flota->auto_modelo->descripcion ?? 'No asignado'}}</b></td>
                                <td class="col-3">Patente: <b>{{$flota->matricula ?? 'No asignado'}}</b></td>
                            <td class="col-3">Año: <b>{{$flota->año ?? 'No asignado'}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr style="border: 1px solid black; margin: 3px">
</header>
 
<main>      
    <div class="text-center" style="overflow-x:auto;">
        <table class="table table-sm table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Monto</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($rendicion->detalles as $index => $detalle)
                @php
                    $total = isset($total) ? $total + ($detalle->kilometraje + ($detalle->kilometraje*0.3)) * 1072 : 0;
                @endphp
                    <tr class="">
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$detalle->fecha}}</td>
                        <td>{{$detalle->sitio_desde->descripcion}}</td>
                        <td>{{$detalle->sitio_hasta->descripcion}}</td>
                        <td>{{($detalle->kilometraje + ($detalle->kilometraje*0.3))}}</td>
                        <td>{{number_format(($detalle->kilometraje + ($detalle->kilometraje*0.3)) * 1072, 0, ',', '.')}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total a pagar:</b></td>
                        <td><b>{{number_format($total, 0, ',', '.')}}</b></td>
                    </tr>
            </tbody>
        </table>
    </div>
</main>
 
<footer>
    <div class="row text-center" style="padding-top: 0px; padding-bottom: 0px;">
        <table class="table table-sm table-borderless text-center" style=" margin:0px;">
            <tbody>
                <tr>
                    <td>Federico Ariel Baez Villalba<br>4708532</div></td>
                    <td>Pablo Augusto Cabral<br>4708532</div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr style="border: 0.3px solid black; margin:3px">
    <div class="row">
        <div class="col-12 text-right" style="padding-top: 5px">
            Fecha de Impresión: {{ \Carbon\Carbon::now()->format('d/m/Y')}} - {{ \Carbon\Carbon::now()->toTimeString()}}
        </div>
    </div>
</footer>
</body>
</html>