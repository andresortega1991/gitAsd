@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" value=" {{ $user = Auth::user() }}">
            <!---------->

         
            <!---------->
            <div class="row">
            <div class="container-fluid">
                <div class="float-left ml-5" >
                  @if(isset($OtroUser))
                
                  @include('includes.chiches.avatar3-otro',["OtroUser",$OtroUser])
                </div>
                  <div class="float " style="margin-left:250px; margin-top:80px;">
                    <ul>                                                 
                            {{ $OtroUser->name." ".$OtroUser->surname." ".$OtroUser->surname2 }} 
                            @if($OtroUser->id ==  $user->id)
                            <button type="button" class="btn btn-agora ml-5"  >  <a style="color:black" href="{{route('config')}}">Editar Perfil</a></button>
                            @endif
                             <br>                                       
                            {{ $OtroUser->email }} <br>                      
                    </ul>                 
                  @else
                 
                  @include('includes.chiches.avatar3')
                </div>

                <div class="float " style="margin-left:250px; margin-top:80px;">
                    <ul>                
                              <!------------  Prueba de seguridad -------- <script>alert("Hola")</script>   { !! !! ] ----------->                                 
                              <!------------  Prueba de seguridad -------- ----------->                                 
                            {{ $user->name." ".$user->surname." ".$user->surname2 }}  <button type="button" class="btn btn-light ml-5"  style="background-color: rgb(240, 142, 54);">  <a style="color:black" href="{{route('config')}}">Editar Perfil</a></button>
                             <br>                                       
                            {{ $user->email }} <br>                      
                    </ul>
                 
                  @endif   
                   
                </div>

            </div>
        </div>
   
            <hr>
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    id 
                  </div>
                  <div class="col-sm">
                    nombre
                  </div>
                  <div class="col-sm">
                   votos
                  </div>
                  <div class="col-sm">
                    foto
                  </div>
                </div>
              </div>          
            <hr>


    

            <div class="container">
            <div class="row" value="">       
                <p value="  {{$foto=0}}{{$x=0}}"></p>
            @foreach ($proyectos   as $proyecto )

            <p value="{{$foto++}} {{$x++}}"></p>
         
                <div class="col-sm">
                  @if ($proyecto->image_path)             
                  <div class="image-container" style="margin-top: 20px; margin-bottom:20px; ">
               <a href=""> <img src="{{ route('images.avatar',['filename'=>$proyecto->image_path]) }}"  class="image"> </a>
                  
                 
                  </div>
                  @endif
                </div>     
               
                @if($x==4)
                 </div>
                 </div>    
                 <div class="container">
                 <div class="row" value="">
                    <p value=" {{$x=0}}"></p>
                @endif
            @endforeach
        </div>
    </div>    

        </div>
    </div>
</div>
@endsection


































