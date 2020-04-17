@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="margin: 0px;">
    <div class="col-md-8">
        <div class="card shadow p-3 mb-3 bg-white rounded">        
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 bg-white rounded">        
                            <div class="card-body container text-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 style=" font-size: 50px;"> <b>400</b> </h1>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4><p class="text-muted"> kilometros</p></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                        <i class="fas fa-map-signs fa-4x text-primary"></i>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-3 bg-white rounded">        
                            <div class="card-body container text-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 style=" font-size: 50px;"> <b>300</b> </h1>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4><p class="text-muted"> litros</p></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                        <i class="fas fa-gas-pump fa-4x text-danger"></i>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-3 bg-white rounded">        
                            <div class="card-body container text-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 style=" font-size: 50px;"> <b>500.000</b> </h1>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4><p class="text-muted"> guaranies</p></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                        <i class="fas fa-money-bill fa-4x text-success"></i>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow p-3 mb-3 bg-white rounded">        
                            <div class="card-body container">
                                <grafico-component></grafico-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection    

