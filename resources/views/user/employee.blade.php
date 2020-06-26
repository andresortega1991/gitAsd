@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" value="{{ $i=0 }}">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('config') }}">Mi perfil </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('Ctrabajador') }}">Ser
                                Trabajador </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href=""></a>
                        </li>
                    </ul>
                </div>
            </div> <br>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home{{ $i }}">Mis datos
                                    </a>
                                </li>
                           
                             
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menuEliminar{{ $i }}">Eliminar Mi registro de trabajador</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menuEditar{{ $i }}">Ver mis Solicitudes de Trabajo</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home{{ $i }}">
                                    <form method="POST" action="{{ route('save.employee') }}"
                                        enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                                        @csrf
                                        <!---- ----->
                                        <!--                         un input  Nombre                                 -->
                                        <div class="form-group row">
                                            <label for="textarea"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Escriba sobre su experiencia laboral') }}</label>
                                            <div class="col-md-6">
                                                <textarea rows="4" , cols="54" id="textarea" name="textarea"
                                                    style="resize:none, "
                                                    class="form-control @error('textarea') is-invalid @enderror"
                                                    autofocus
                                                    placeholder="@if ($trabajador->descripcion == "")Registrse conmo Trabajador 500 caracteres máximo @else{{ $trabajador->descripcion }} @endif"></textarea>
                                                @if($errors->has('textarea'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('textarea') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ccv_paht"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su Curriculum') }}</label>
                                            <div class="col-md-6">
                                                <input id="ccv_path" type="file"
                                                    class="form-control{{ $errors->has('ccv_paht') ? ' is-invalid' : '' }}"
                                                    name="ccv_paht">
                                                @if($errors->has('ccv_paht'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ccv_paht') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-md-offset-4">
                                            </div>
                                            <button type="submit" class="btn btn-ml btn-agora"style="min-width: 350px;">
                                                Eviar Registro
                                            </button>
                                        </div>
                                    </form>
                                </div>
                         
                                <!-- termina mi areatext-->
                                <div class="tab-pane container fade" id="menuEditar{{ $i ?? '' }}">
                                    <form method="POST" action="{{ route('save.employee') }}"
                                        enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                                        @csrf

                    <!------------------------------------------------------------>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Proyecto</th>
                                                <th scope="col">cargo</th>
                                                <th scope="col">Fecha de inicio</th>
                                                <th scope="col">Aceptar solicitud</th>
                                              </tr>
                                            </thead>
                                            <tbody value="{{$n=1}}">
                                           
                                                <?php $trabajadorx = Auth::user()->trabajador2 ?>
                                              
                                                @foreach ($trabajadorx as $t )
                                                    <?php  $solicitudes=$t->solicitudes ?>
                                                @endforeach
                                             
                                       @if(isset($solicitudes))
                                             @foreach ($solicitudes as $s )
                                                                                            
                                              <tr>
                                              <th scope="row">{{$n++}}</th>
                                              <td>{{$s->proyecto->nombre}}   </td>
                                                <td>{{$s->cargo2->descripcion}} <a href="{{route("Dsolicitud",["id"=>$s->id])}}"> <img src="{{asset('img/Delet.png')}}" alt=""> </a></td>
                                                <td>{{$s->proyecto->fecha}}</td>
                                                <td>
                                                @if ($s->estado_id==5)
                                                <a class="btn btn-agora"  href="{{route('Csolicitud3',['solicitud'=>$s])}}">Aceptar Solicitudes de Trabajo</a>
                                                @endif    
                                                </td>
                                              </tr>
                                              @endforeach   
                                              @endif
                                            </tbody>
                                          </table>
                                        <!---- ----->
                                     
                                      
                                    </form>
                                </div>

                                <div class="tab-pane container fade" id="menuEliminar{{ $i ?? '' }}">
                                    <form method="POST" action="{{ route('save.employee') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                                        @csrf
                                        <!---- ----->
                                   
                                      
                                            <div class="container">
                                                <div class="row">
                                                  <div class="col-3">
                                                    <label for="" class="">{{ __('Tenga en cuenta las sigientes restricciones:') }}</label>
                                                  </div>
                                                  <div class="col-9">
                                                 <ul>
                                                     <li>1.- No podra borrar su cuenta si mantiene un trabajo con algún proyecto en curso.</li>
                                                     <li>2.- Todas sus solicitudes de trabajo seran eliminadas.</li>
                                                     <li>3.- Toda su actividad como trabajador dentro de agora como trabajador no se podra recuperar.</li>
                                                     <li>Si tiene  problemas o dudad contactese a la brevedad con algun administrador de agora.  </li>
                                                 </ul>
                                                  </div>
                                             
                                                </div>
                                              </div>
                                
                                        <div class="form-group row">
                                            <div class="col-md-3 col-md-offset-4">
                                            </div>
                                           <?php $user= Auth::user() ?>
                        
                                            @foreach ( $user->trabajador2 as $trabajador )
                                                <?php  $id=$trabajador->id  ?>
                                                <a href="{{route("Dtrabajador",["id"=>$id])}}"  class="btn btn-lg btn-block btn-agora">   Eliminar mi registro </a>
                                            @endforeach
                                      
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endsection
