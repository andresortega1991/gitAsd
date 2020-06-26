@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

       

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>             
                @foreach ($errors->all() as $error)
                @if($error=='El campo input group select01 es obligatorio.')
                <li>  {{'Seleccione una categoria valida'}}</li>
                @ELSEIF($error=='El campo capital debe contener entre 6 y 7 caracteres.')
                <li>  {{'Ingrese un valor dentro del rango admitido en el monto de su proyecto'}}</li>
                 @else
                 <li>{{ $error }}</li>
                @endif                 
                @endforeach
            </ul>
        </div>
    @endif   
            <div class="card">
                <div class="card-header">{{ __('Crear el Proyecto') }}</div>

                <div class="card-body">
                    <!----acaaaaaaaaaaaaaaaaaaaaa el form postular--->
                    <form method="POST" action="{{route('Cproject2')}}" enctype="multipart/form-data" aria-label="">
                        @csrf
                      <!---- ----->
                   <!--                          Nombre Proyecto                                -->
                   <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Del Proyecto') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <!--                          Ingrese el objetivo                                -->
                <div class="form-group row">
                    <label for="objetivo" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el objetivo  ') }}</label>

                    <div class="col-md-6">
                        <input id="objetivo" type="text" class="form-control @error('objetivo') is-invalid @enderror" name="objetivo" value="" required  autocomplete="objetivo" autofocus>

                        @error('objetivo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                   <!--                           un input                                   -->


 <!--                           Ingrese el alcance                               -->
 <div class="form-group row">      
<label for="alcance" class="col-md-4 col-form-label text-md-right">{{(' Ingrese el alcance ')}}</label>                
 <div class="col-md-6" value="{{$n=0}}">
 @foreach ($alcances as $alcance )
 <p value="{{$n++}}"></p>
 <div class="custom-control custom-radio custom-control" >
    @if($n==2)
    <input    type="radio" id="customRadioInline{{$n}}"name="alcance" value="{{$alcance->id}}" class="custom-control-input">
    <label id='alcance'   class="custom-control-label" for="customRadioInline{{$n}}">{{$alcance->descripcion}}</label>
    @else
    <input type="radio" id="customRadioInline{{$n}}"name="alcance" value="{{$alcance->id}}" class="custom-control-input">
    <label id='alcance'     class="custom-control-label" for="customRadioInline{{$n}}">{{$alcance->descripcion}}</label>
    @endif
   

 
</div>
 @endforeach
</div>
</div>
   <!--                           un input                                   -->

                    <!--                             Ingrese el descripción                                -->
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese una Descripción ') }}</label>

                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="" required autocomplete="descripcion" autofocus>

                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   <!--                           un input                                   -->
                       <!--                           Ingrese el capital                                -->
                       <div class="form-group row">
                        <label for="capital" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese el Capital  ') }}</label>

                        <div class="col-md-6">
                            <input id="capital" type="number" class="form-control @error('capital') is-invalid @enderror" name="capital" value="0" required autocomplete="capital" autofocus>

                            @error('capital')
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
                       <!--                            En que categoria se clasifica                                -->             
                   <!--                           un input                                   -->
                   <div class="form-group row">
                    <label for="capital" class="col-md-4 col-form-label text-md-right">{{ __('Categoria ') }}</label>
                    <div class="col-md-6">                  
                    <div class="input-group-prepend">                  
                    </div>
                    <select class="custom-select" value="" name="inputGroupSelect01" id="inputGroupSelect01">
                        @foreach ($categorias as  $cate)
                    <option value="{{$cate->id}}">{{$cate->descripcion}}</option>
                        @endforeach                    
                   </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Imagen d eproyecto ') }}</label>
                    <div class="col-md-6">      
                           
                    <input  id="image_path" type="file" name="image_path" class="form-control" required>
                        @if($errors->has('image_path'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image_path')}}</strong>
                            </span>
                        @endif
                  </div>
                </div>

                   <!--- --->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="btn" type="submit" class="btn btn-agora " >
                                Crear Proyecto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection