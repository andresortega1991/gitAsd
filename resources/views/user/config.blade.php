@extends('layouts.app')

@section('content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" value="{{ $i=0 }}">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link  active" href="{{ route('config') }}">Mi Perfil </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('Ctrabajador') }}">Ser
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
            <div class="alert alert-success" >
               {{  session('message') }}
            </div>
        @endif
          

            <div class="card">
                <div class="card-header">{{ __('Actualizar Mi Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                        @csrf
                      <!---- ----->
                   <!--                           un input  Nombre                                 -->
                   <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <!--                           un Apellido  Paterno                                 -->
                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value=" {{ Auth::user()->surname }}" required autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                   <!--                           un input                                   -->
                <!--                           Apellido  Materno                                 -->
                <div class="form-group row">
                    <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                    <div class="col-md-6">
                        <input id="surname2" type="text" class="form-control @error('surname2') is-invalid @enderror" name="surname2" value="{{ Auth::user()->surname2 }}" required autocomplete="surname2" autofocus>

                        @error('surname2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                   <!--                           un input                                   -->
                    <!--                            Fecha de nacimiento                                -->
                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                        <div class="col-md-6">
                            <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" value=" {{ Auth::user()->date }} " required autocomplete="date" autofocus>

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!--                           un input                                   -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                  


                    <div class="form-group row">
                      
                        
                        <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                        <div class="col-md-6">
                            @include('includes.avatar')
                            
                            <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path">

                            @if ($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                       <div class="col-md-4 col-md-offset-4">

                       </div>
                            <button type="submit" class="btn btn-ml btn-agora" style="min-width: 350px;" >   
                                                         Guardar cambios
                            </button>
                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection