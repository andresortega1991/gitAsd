 


@extends('layouts.app')

@section('content')

  <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-10" value="{{$i=0}}">
           
         @include('includes.message')
     
           @foreach ($votos as $voto )
          

            <div class="card">

                @if ($voto->proyecto->image_path)
                <div class="image-container">
                <img src="{{ route('images.avatar',['filename'=>$voto->proyecto->image_path]) }}" alt="" class="image card-img-top">
                </div>
                @endif
               
                <div class="card-body">
                <h4 class="card-title">{{$voto->proyecto->nombre}}</h4>

                    <p class="card-text">{{$voto->proyecto->descripcion}}</p>
                </div>
                <div class="descrition">
                    <p> </p>
                    <p>{{\FormatTime::LongTimeFilter($voto->proyecto->created_at)}}</p>
                    <?php  $user_voto=false ?>
                     @foreach ($voto->proyecto->votos as  $voto )
                     @if($voto->user->id== Auth::user()->id)
                         <?php  $user_voto=true ?>
                      @endif   
                     @endforeach
                    <div class=like>          
                     @if($user_voto)
                    <img src=" {{asset('img/Rcorazon.png')}}" data-id="{{$voto->proyecto->id}}"   class="btn-like">
                    @else
                    <img src=" {{asset('img/Ncorazon.png')}}"  data-id="{{$voto->proyecto->id}}" class="btn-dislike">
                     @endif
                     <span class="number_likes">   {{count($voto->proyecto->votos)}} </span>
                    </div> 
                    <div class="comments">
                    <a href="{{route('voto',['proyecto_id'=>$voto->proyecto->id])}}" class="btn btn-warning btm-sm btn-comments">comentarios({{count($voto->proyecto->comentarios)}})</a>       
                   </div>           
                  </div>
                  <?php $recaudado=0  ?>
                    @foreach ($voto->proyecto->donaciones as$donacion )
                        <?php $recaudado+=$donacion->monto ?>
                    @endforeach
                    <p>Proyecto Creado {{\FormatTime::LongTimeFilter($voto->proyecto->created_at)}}</p>
                    <p>${{$recaudado."-de-$".$voto->proyecto->capitalNecesario}} CLP </p>
              
                    <?php $div =$voto->proyecto->capitalNecesario ?>
                    <?php $div2=$recaudado  ?>
                    <?php $porcentaje=$div2/$div  ?>
                     <p style="">---------------> {{$porcentaje*100}}% </p>
                    <div class="progress" >                  
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" value="" style="width: {{$porcentaje*100}}%"></div>                 
                     </div>
                  <div class="card-footer">           
                    <a value="{{$voto->proyecto}}" class="btn btn-lg btn-block btn-agora" href="{{route('donar',['proyecto'=>$voto->proyecto])}}"  >Donar</a>                                                                                                                  
      </div>
            </div>
         
              <br><br>
           @endforeach
          
          
          </div>
          
        </div>      
    </div >  
  </div>
@endsection
