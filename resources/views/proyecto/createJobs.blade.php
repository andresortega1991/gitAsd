@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" value="{{ $i=0 }}">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('Vproject') }}">Proyectos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('Cjob') }}">Solicitud de trabajo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>

@foreach ($proyectos as $proyecto)
   

            <div class="card" value="{{ $i++ }}">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SolicitudProyecto{{ $i }}">Solicitudes de Proyecto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#CrearSolicitudProyecto{{ $i }}">Crear Solicitud de Proyecto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#EliminarSolicitudProyector{{ $i }}">Eliminar Solicitud de Proyector</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="SolicitudProyecto{{ $i }}">
                           
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">pago</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col">Fecha de Termino</th>
                                  </tr>
                                </thead>
                                <tbody>                                  
                                   @foreach (  $proyecto->cargos as $car )
                                       
                                
                                    <tr>
                                        <th scope="row">{{$car->descripcion}}</th>
                                        <td>{{$car->pago}}</td>
                                        <td>{{$car->fecha_in}}</td>
                                        <td>{{$car->fecha_ter}}</td>
                                      </tr>
                                      @endforeach                                 
                                        </tbody>
                                      </table>  

                        </div>
                        <div class="tab-pane container fade" id="CrearSolicitudProyecto{{ $i }}">
                          <!--   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx --->
                        
                        
                                <form method="POST" action="{{route('Ccargo')}}" enctype="multipart/form-data" aria-label="">
                                    @csrf
                                  <!---- ----->
                                    <!--                          Nombre Proyecto                                -->
                               <div class="form-group row">                                                            
                                <input id="id" hidden type="text" name="id" value="{{$proyecto->id}}" required autocomplete="name" readonly autofocus> 
                            </div>
                            <!--                          Ingrese el objetivo                                -->
                               <!--                          Nombre Proyecto                                -->
                               <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Del Proyecto') }}</label>
            
                                <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$proyecto->nombre}}" required autocomplete="name" readonly autofocus>
            
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <!--                          Ingrese el objetivo                                -->
                            <div class="form-group row">
                                <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el Cargo del trabajo  ') }}</label>
            
                                <div class="col-md-6">
                                    <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="" required  autocomplete="cargo" autofocus>
            
                                    @error('cargo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                               <!--                           un input                                   -->
            
            
          
            
                              
                                   <!--                           Ingrese el pago                                -->
                                   <div class="form-group row">
                                    <label for="pago" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el pago  ') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="pago" type="number" class="form-control @error('pago') is-invalid @enderror" name="pago" value="0" required autocomplete="pago" autofocus>
            
                                        @error('pago')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               <!--                           un input                                   -->
                                   <!--                            Fecha de Inicio                                -->
                                   <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese la Fecha de Inicio') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="" required autocomplete="date" autofocus>
            
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               <!--                           un input                                   -->
                                   <!--                            Fecha de terminno                                -->
                                   <div class="form-group row">
                                    <label for="date2" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese la Fecha de termino') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="date2" type="date" class="form-control @error('date2') is-invalid @enderror" name="date2" value="" required autocomplete="date2" autofocus>
            
                                        @error('date2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               <!--                           un input                                   -->
                                         <!--- --->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-agora" >
                                Crear Cargo
                            </button>
                        </div>
                    </div>
                </form>
                              
              
                          <!---  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  ---->
                        </div>
                        <div class="tab-pane container fade" id="EliminarSolicitudProyector{{ $i ?? '' }}">
                            <h1>33</h1>
                        </div>
                 </div>
                </div>
                <div class="card-footer">
                   
                </div>
            </div>
            <br> <br>
            @endforeach
                @endsection
