@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" value="{{ $i=0 }}">
            
           

      @if (isset($message))
      <div class="alert alert-success">
          {{$message}}
        </div>
      @endif

      @if (isset($messageAlerta))
      <div class="alert alert-danger">
          {{$messageAlerta}}
        </div>
      @endif
       

            <div class="card" value="{{ $i++ }}">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home{{ $i }}">Donar </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1{{ $i }}">Objetivo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2{{ $i }}">Descripción</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home{{ $i }}">
                            <form method="POST" action="{{ route('donar2') }}"enctype="multipart/form-data" aria-label="">
                                @csrf
                                <div class="form-group row">
                                    
                                    <input id="proyectoCompleto" hidden type="number"class="form-control " name="id" value="{{$proyecto}}" required autocomplete="id" readonly autofocus>
                                    <input id="id" hidden type="number"class="form-control " name="id" value="{{$proyecto->id}}" required autocomplete="id" readonly autofocus>
                                </div>                     
                                 <div class="form-group row">
                                         <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Del Proyecto') }}</label>
                                     <div class="col-md-6">
                                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $proyecto->nombre }}" required autocomplete="name" readonly autofocus>

                                         @if($errors->has('name'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>
                                <!--                          Nombre del dueño Proyecto                                -->
                                <div class="form-group row">
                                    <label for="usuario"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nombre Del Creador ') }}</label>

                                    <div class="col-md-6">
                                        <input id="usuario" type="text"
                                            class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                            value="{{ $proyecto->user->name.' '.$proyecto->user->surname.' '.$proyecto->user->surname2 }}"
                                            readonly autofocus>

                                        @if($errors->has('usuario'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('usuario') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!---    termina  ------->
                                 <!--                           Ingrese el alcance                               -->
                                 <div class="form-group row">
                                    <label for="MetodoPago" class="col-md-4 col-form-label text-md-right @error('MetodoPago') is-invalid @enderror">{{ (' Ingrese el alcance ') }}</label>
                                    <div class="col-md-6">
                                        <div class="  @error('MetodoPago') is-invalid @enderror">
                                        <input type="radio" id="male" name="MetodoPago" value="Transferencia">
                                        <label for="Transferencia">Transferencia</label><br>
                                        <input type="radio" id="female" name="MetodoPago" value="Devito">
                                        <label for="Devito">Devito</label><br>
                                        <input type="radio" id="other" name="MetodoPago" value="Credito">
                                        <label for="Credito">Credito</label>
                                         </div>
                                        @error('MetodoPago')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                 <!--                           Ingrese el capital                                -->
                                <div class="form-group row">
                                    <label for="capital"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el Monto  ') }}</label>

                                    <div class="col-md-6">
                                        <input id="capital" type="number"
                                            class="form-control @error('capital') is-invalid @enderror" name="capital" value="0"
                                            required autocomplete="capital" autofocus>

                                        @error('capital')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-lg btn-block btn-agora" >
                                            Donar
                                        </button>
                                    </div>
                                </div>
                            </form>
                                     
                 </div>
                    <div class="tab-pane container fade" id="menu1{{ $i }}">
                      
                       
                 
                    </div>
                    <div class="tab-pane container fade" id="menu2{{ $i }}">
                     
                    </div>
                </div>
            </div>
            <div class="card-footer">
               
            </div>
        </div>
        <br><br>


    </div>
</div>
</div>
@endsection
