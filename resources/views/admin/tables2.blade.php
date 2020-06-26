@php
  
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10" >
<div class="card" >   
    <div class="card-header">           
         <ul class="nav nav-tabs">
            <li class="nav-item">
                 <a class="nav-link "  href="{{route('dbmaster')}}">Proyectos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="">Usuarios  </a>
            </li>   
         </ul>
    </div>   
</div>   
</div>   
<br> <br>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10" value="{{$i=0}}">

@foreach ( $usuarios as $usuario ) 

    <div class="card" value="{{$i++}}">   
    <div class="card-header">           
         <ul class="nav nav-tabs">
            <li class="nav-item">
                 <a class="nav-link active " data-toggle="tab" href="#home{{$i ?? ''}}">{{$usuario->name." "}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#menu1{{$i ?? ''}}">Descripción</a>
            </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#menuProyecto{{$i ?? ''}}">Proyectos</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuComentario{{$i ?? ''}}">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuSolicitudes{{$i ?? ''}}">Solicitud</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuDonacciones{{$i ?? ''}}">Donación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuChat{{$i ?? ''}}">Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuTrabajador{{$i ?? ''}}">Trabajador</a>
            </li>          
         </ul>
    </div>   
    <div class="card-body">
              <!--  -->
         <div class="tab-content">
            <div class="tab-pane container active" id="home{{$i ?? ''}}">
                @include('includes.avatar')
                             
               @if ($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                @endif
                
            </div>
              <!-- aca termina la tabla de presentacion proyecto-->
            <div class="tab-pane container fade" id="menu1{{$i ?? ''}}">
               <table class="table">
  <thead>
    <tr>
      <th scope="col">*</th>
      <th scope="col">Dato de Proyecto</th>
      <th scope="col">Acccion</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>NOMBRE  </th>
      <td>{{$usuario->name}}</td>
      <td>  <button id="{{$usuario->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
    
    </tr>
    <tr>
      <td>APELLIDO PATERNO </th>
      <td>{{$usuario->surname}}</td>
      <td>  <button id="{{$usuario->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
      
    </tr>
    <tr>
      <td>APELLIDO MATERNO  </th>
      <td>{{$usuario->surname2}}</td>
      <td>  <button id="{{$usuario->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
      
    </tr>
    <tr>
        <td>EMAIL  </th>
        <td> {{$usuario->email }}</td>
        <td>  <button id="{{$usuario->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        
      </tr>
      <tr>
        <td>Fecha  </th>
        <td>{{$usuario->date}}</td>
        <td>  <button id="{{$usuario->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>    
      </tr>
     
  </tbody>
</table>
            </div>
                    <!-- aca termina la tabla de Solicitud-->     
<div class="tab-pane container fade" id="menuProyecto{{$i ?? ''}}">
  @foreach ($usuario->proyecto as $pro)
  <table class="table">
           <thead>
             <tr>
               <th scope="col">*</th>
               <th scope="col">Dato de Proyecto</th>
               <th scope="col">Acccion</th>
             
             </tr>
           </thead>
        
           <tbody>
             <tr>
               <td>Nombre  </th>
               <!-- con este comando traigo todos los proyectops del usuario y tengo q  u recorrelos con el foreach para cada proyecto tengo que hacer una vcuadro   -->          
                <td>{{$pro->nombre}}</td>             
               <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
  
             </tr>
             <tr>
               <td>Alcance </th>
               <td><p>{{$pro->alcance->descripcion}}</p></td>
               <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
               
             </tr>
             <tr>
               <td>Descripción  </th>
               <td> <p>{{$pro->descripcion}}</p></td>
               <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
               
             </tr>
             <tr>
                 <td>Capital Necesario  </th>
                 <td> <p>{{$pro->capitalNecesario}}</p></td>
                 <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
                 
               </tr>
               <tr>
                 <td>Fecha  </th>
                 <td><p>{{$pro->fecha}}</p></td>
                 <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
                 
               </tr>
               <tr>
                 <td>Categoria</th>
                 <td>  <p>{{$pro->categoria->descripcion}} </p></td>
                 <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
                 
               </tr>
               <tr>                              
                 <td value="{{$monto=0}}">Bolsas</th>
                 @foreach ( $pro->donaciones as $donacione)
                <p value="{{$monto+=$donacione->monto}}  "></p>      
                 @endforeach
                 <td>  <p>{{$monto}} </p></td>
                 <td>  <button id="{{$pro->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
               </tr>
               @endforeach
           </tbody>
         </table>   
                     </div>
                         <!-- aca termina la tabla de presentacion descripcion proyecxto-->        
                           <!-- aca  la tabla de Comentario-->                
                         <div class="tab-pane container fade" id="menuComentario{{$i ?? ''}}" >
              
                          <table class="table" value="{{$x=-1}}" >
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Apellido</th>
                                      <th scope="col">Mensaje</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  
                              @foreach ($usuario->comentarios as $comentario )  
                           
                              <tbody class="thead-light" value="{{$x++}}">
                                    <tr>
                                    <th scope="row">{{$i+$x}}</th>
                                      <td> {{$comentario->user->name}}</td>
                                      <td>  {{$comentario->user->surname." ".$comentario->user->surname2}}</td>
                                      <td>{{$comentario->descripcion}}</td>
                                      <td>    <a href="{{route("Dmensaje",["id"=>$comentario->id])}}"> <img src="{{asset('img/Delet.png')}}" alt=""> </a> </td>
                                    </tr>               
                              @endforeach
                              </tbody>
                              </table>
                          </div>       
                  <!-- aca termina la tabla de Comentario-->   
                  <!-- aca  la tabla de solicitud-->
            <div class="tab-pane container fade" id="menuSolicitudes{{$i ?? ''}}">
              <table class="table" value="{{$x=-1}}" >
               <thead class="thead-light">
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Estado de solicitud</th>
                   <th scope="col">Mensaje</th>
                   <th scope="col">Acciones</th>
                 </tr>
               </thead>  
              @foreach ($usuario->trabajador3 as $tra )
                @foreach ($tra->solicitudes as $soli )
                    <tr>
                      <th scope="row">{{$i+$x}}</th>
                        <td> {{$soli->proyecto->nombre}}</td>
                        <td>  {{$soli->estado}}</td>
                        <td>{{$soli->descripcion}}</td>
                        <td>  <button id="{{$soli->id}}" type="button" class="btn  btn-danger"> Eliminar</button> </td>
                      </tr>    
                @endforeach
              @endforeach                                      
           <tbody class="thead-light" value="{{$x++}}">
                        
      
           </tbody>
           </table>
           </div>
    <!-- aca termina la tabla de Solicitud-->    
    <div class="tab-pane container fade" id="menuDonacciones{{$i ?? ''}}">
   
      <table class="table" value="{{$x=-1}}" >
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Monto</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>               
      @foreach ($usuario->donaciones as $donacion)                        
      <tbody class="thead-light" value="{{$x++}}">
            <tr>
            <th scope="row">{{$i+$x}}</th>
              <td> {{$donacion->user->name}}</td>
              <td>  {{$donacion->user->surname." ".$donacion->user->surname2}}</td>
              <td>{{$donacion->monto}}</td>
              <td>  <button id="{{$donacion->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
            </tr>               
      @endforeach
      </tbody>
      </table>
  </div>
<!-- aca termina la tabla de Donaciones-->
<div class="tab-pane container fade" id="menuChat{{$i ?? ''}}">
   <h3>Enviados</h3>
  <table class="table" value="{{$x=-1}}" >
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">mensaje</th>
          <th scope="col">Acciones</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
        </tr>
      </thead>  
        
  @foreach ($usuario->chatOut as $chat)
  
  <tbody class="thead-light" value="{{$x++}}">
        <tr>
        <th scope="row">{{$i+$x}}</th>
          <td> {{$chat->user->name}}</td>
          <td> {{$chat->user->surname." ".$chat->user->surname2}}</td>
          <td>{{$chat->mensaje}}</td>
          <td>{{$chat->fecha}}</td>
          <td>{{$chat->hora}}</td>
          <td>  <button id="{{$chat->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        </tr>               
  @endforeach
  </tbody>
  </table>
  <h3>Recibidos</h3>
  <table class="table" value="{{$x=-1}}" >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">mensaje</th>
        <th scope="col">Acciones</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
      </tr>
    </thead>    

@foreach ($usuario->chatIn as $chat)                        
<tbody class="thead-light" value="{{$x++}}">
      <tr>
      <th scope="row">{{$i+$x}}</th>
      <td> {{$chat->user->name}}</td>
      <td> {{$chat->user->surname." ".$chat->user->surname2}}</td>
      <td>{{$chat->mensaje}}</td>
      <td>{{$chat->fecha}}</td>
      <td>{{$chat->hora}}</td>
        <td>  <button id="{{$chat->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
      </tr>               
@endforeach
</tbody>
</table>
</div>
            <!-- aca termina la tabla de chat-->      
            <div class="tab-pane container fade" id="menuTrabajador{{$i ?? ''}}">
              <table class="table" value="{{$x=-1}}" >
               <thead class="thead-light">
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Apellido</th>
                   <th scope="col">Descripción</th>
                   <th scope="col">Acciones</th>
                 </tr>
               </thead>  
              @foreach ($usuario->trabajador3 as $tra )
          
                    <tr>
                      <th scope="row">{{$i+$x}}</th>
                        <td> {{$usuario->name}}</td>
                        <td> {{$usuario->surname." ".$usuario->surname2}}</td>
                        <td>{{$tra->descripcion}}</td>
                        <td>  <button id="{{$soli->id}}" type="button" class="btn  btn-danger"> Eliminar</button> </td>
                      </tr>    
              
              @endforeach                                      
           <tbody class="thead-light" value="{{$x++}}">
                        
      
           </tbody>
           </table>
           </div>   
            


 <!-- aca termina la tabla de chat--> 

         </div>
     </div>
              <div class="card-footer">
</div>
</div>
<br><br>
@endforeach
</div>
</div>
@endsection
