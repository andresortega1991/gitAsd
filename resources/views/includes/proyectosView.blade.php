<div class="card pub_image" value="{{$i++}}" >   
    <div class="card-header">           
         <ul class="nav nav-tabs" >
            <li class="nav-item">          
            <a class="nav-link active" data-toggle="tab" href="#home{{$i}}" > {{$proyecto->nombre}}</a>
            </li>       
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#menu2{{$i}}">Descripción</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuComentarios{{$i}}">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ session('message') ? 'is-invalid' : '' }}" data-toggle="tab" href="#menuTrabajo{{$i}}">Oferta de trabajo</a>
            </li>            
              <a class="{{ session('message') ? 'is-invalid' : '' }}"  href="{{route('VPerfil2',['OtroUser'=> $proyecto->user])}}"> <div class="" style="  width: 35px;  height: 35px;  border-radius: 900px;  overflow: hidden;"> @include('includes.users.avatarUsers',['user'=>$proyecto->user])  </div> </a>       
         </ul>
    </div>   
    <div class="card-body">
              <!-- Tab panes -->
         <div class="tab-content">
          @if(session('message'))
<div class="tab-pane container  fade" id="home{{$i}}">
  @else
  <div class="tab-pane container active" id="home{{$i}}" >
  @endif
             @include('includes.proyecto')  
        <hr class="btn-agora">             
         <div class="descrition">
           <?php $recaudado=0  ?>
           @foreach ($proyecto->donaciones as$donacion )
               <?php $recaudado+=$donacion->monto ?>
           @endforeach
           <p>Proyecto Creado {{\FormatTime::LongTimeFilter($proyecto->created_at)}}</p>
          <p>${{$recaudado."-de-$".$proyecto->capitalNecesario}} CLP </p>    
          <?php $div =$proyecto->capitalNecesario ?>
          <?php $div2=$recaudado  ?>
          <?php $porcentaje=$div2/$div  ?>      
           <div class="progress">       
           <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" value="" style="width: {{$porcentaje*100}}%"></div>     
          </div>
          <hr class="btn-agora">  
          <br> 
           <?php  $user_voto=false ?>
            @foreach ($proyecto->votos as  $voto )
            @if($voto->user->id== Auth::user()->id)
                <?php  $user_voto=true ?>
             @endif   
            @endforeach
           <div class=like>          
            @if($user_voto)
           <img src=" {{asset('img/Rcorazon.png')}}" data-id="{{$proyecto->id}}"   class="btn-like">
           @else
           <img src=" {{asset('img/Ncorazon.png')}}"  data-id="{{$proyecto->id}}" class="btn-dislike">
            @endif
            <span class="number_likes">   {{count($proyecto->votos)}} </span>
           </div> 
           <div class="comments">           
           <a  type="button" data-toggle="modal" data-target="#exampleModal{{$indice}}" class="btn btn-warning btm-sm btn-comments">Deja tu comentario({{count($proyecto->comentarios)}})                  
          </a>            
          </div>           
         </div>
               @if ($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                @endif
            </div>           
            <!---       termina aca  ---->
            @if(session('message'))
            <div class="tab-pane container active " id="menuTrabajo{{$i}}">         
            @else
            <div class="tab-pane container  fade" id="menuTrabajo{{$i}}">
            @endif
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Descripcion</th>
          <th scope="col">Monto a pagar</th>
          <th scope="col">Postula</th>         
        </tr>
      </thead>
      <tbody>        
              @foreach ($proyecto->cargos as $car )    
              <!---------------                 aca el form de la creacion de  solicitudes                ----------> 
           <!--este if es el que dice si se muestra la solicitud o no-->                                        
           @if($car->estado_id==9)   
                @csrf                
        <tr>
          <div class="form-group row">   
          <th scope="row">{{$car->descripcion}}</th>    
          <td>                    
              <p>{{$car->pago}}</p>                     
          </td>
          <td>        
              <a value="{{$car}}" class="btn btn-lg btn-block" href="{{route('Csolicitud',['cargo'=>$car])}}" style="background-color: rgb(240, 142, 54);" >Postular</a>   
        </td>  
        </tr>
         @endif()   
        @endforeach
      </tbody>
    </table>
</div>
            <div class="tab-pane container fade" id="menu2{{$i}}">                  
                     <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">objetivo</th>
                          <th scope="col">alcance</th>
                          <th scope="col">capitalNecesario</th>
                          <th scope="col">fecha</th>
                          <th scope="col">categoria</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                 
                          <td> <p>{{$proyecto->objetivo}}</p></td>
                            <td>  <p>{{$proyecto->alcance->descripcion}}</p></td>
                              <td>  <p>{{$proyecto->descripcion}}</p></td>
                                <td>   <p>{{$proyecto->capitalNecesario  }}</p></td>
                                  <td>    <p>{{$proyecto->fecha }} </p></td>
                                    <td>    <p>{{$proyecto->categoria->descripcion }} </p></td>
                        </tr>                                             
                      </tbody>
                    </table>                  
            </div>      
              <div class="tab-pane container fade" id="menuComentarios{{$i}}">         
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Comentario</th>                
                      </tr>
                    </thead>
                    <tbody>
                    <p value="{{$x=0}}"></p>                               
                        @foreach ( $proyecto->comentarios as $comentario )                                                                                    
                        <tr value="{{$x++}}">
                        <th scope="row">{{$x}}</th>
                        <td>
                            <div>
                              @if(isset($comentario->user->image))
                              <a class="{{ session('message') ? 'is-invalid' : '' }}"  href="{{route('VPerfil2',['OtroUser'=> $comentario->user])}}"> <div class="" style="  width: 35px;  height: 35px;  border-radius: 900px;  overflow: hidden;"> @include('includes.users.avatarUsers',['user'=>$comentario->user])  </div> </a>                
                          @else
                            <p>  Sin Foto de usuario  </p>
                          @endif
                        </div>                     
                        </td>
                        <td>{{$comentario->user->name." ".$comentario->user->surname}} 
                          @if($comentario->user->id== Auth::user()->id)
                        <a href="{{route("Dmensaje",["id"=>$comentario->id])}}"> <img src="{{asset('img/Delet.png')}}" alt=""> </a>
                          @endif
                         </td>
                        <td>{{$comentario->descripcion." ::".\FormatTime::LongTimeFilter($comentario->created_at)}} </td>
                      </tr>
                      @endforeach   
                    </tbody>
                  </table>
       </div>
         </div>
     </div>
              <div class="card-footer">           
              <a value="{{$proyecto}}" class="btn btn-lg btn-block btn-agora" href="{{route('donar',['proyecto'=>$proyecto])}}"  >Donar</a>                                                                                                                  
</div>
            </div>
       <br><br>