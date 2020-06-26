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
                 <a class="nav-link active"  href="{{route('dbmaster')}}">Proyectos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('dbmaster2')}}">Usuarios  </a>
            </li>                  
         </ul>
    </div>   
</div>   
</div>   
<br> <br>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10" value="{{$i=0}}">

@foreach ( $proyectos as $proyecto ) 

    <div class="card" value="{{$i++}}">   
    <div class="card-header">           
         <ul class="nav nav-tabs">
            <li class="nav-item">
                 <a class="nav-link active" data-toggle="tab" href="#home{{$i ?? ''}}">{{$proyecto->nombre." "}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1{{$i ?? ''}}">Objetivo</a>
            </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#menuTrabajadores{{$i ?? ''}}">Trabajadores</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuComentario{{$i ?? ''}}">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuDonacciones{{$i ?? ''}}">Donacciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuSolicitudes{{$i ?? ''}}">Solicitudes</a>
            </li>
         </ul>
    </div>   
    <div class="card-body">
              <!--  -->
         <div class="tab-content">
            <div class="tab-pane container active" id="home{{$i ?? ''}}">
              @include('includes.proyecto')  
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
      <td>Objetivo  </th>
      <td>{{$proyecto->objetivo}}</td>
      <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
    
    </tr>
    <tr>
      <td>Alcance </th>
      <td><p>{{$proyecto->alcance->descripcion}}</p></td>
      <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
      
    </tr>
    <tr>
      <td>Descripción  </th>
      <td> <p>{{$proyecto->descripcion}}</p></td>
      <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
      
    </tr>
    <tr>
        <td>Capital Necesario  </th>
        <td> <p>{{$proyecto->capitalNecesario  }}</p></td>
        <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        
      </tr>
      <tr>
        <td>Fecha  </th>
        <td><p>{{$proyecto->fecha }} </p></td>
        <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        
      </tr>
      <tr>
        <td>Categoria</th>
        <td>  <p>{{$proyecto->categoria->descripcion }} </p></td>
        <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        
      </tr>
    <tr value="{{$total=0}}">
        @foreach ($proyecto->donaciones as $bolsa )
    <p value='{{$total+=$bolsa->monto}}'></p>         
          @endforeach
          <td>Bolsas</th>
        <td>  <p>{{$total }} </p></td>
        <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
        
      </tr>
  </tbody>
</table>

            </div>
                <!-- aca termina la tabla de presentacion descripcion proyecxto-->
               <!-- Trabajadores -->
            <div class="tab-pane container fade" id="menuTrabajadores{{$i ?? ''}}">
               
                <table class="table" value="{{$x=-1}}" >
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cargo del trabajador</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    
                @foreach ($proyecto->trabajadores as $trabajador )  

                <tbody class="thead-light" value="{{$x++}}">
                      <tr>
                    
                        
                          
                        <th scope="row">{{$i+$x}}</th>
                     
                          <td> {{$trabajador->trabajador->user2->name}}</td>
                        
      
                          <td>  {{$trabajador->trabajador->user2->surname." ".$trabajador->trabajador->user2->surname2}}</td>
                        
                          <td>{{$trabajador->cargo->descripcion}}</td>
                       
                          <td>  <button id="" type="button" class="btn  btn-danger">Eliminar</button> </td>
                         
                        </tr>               
             
                @endforeach
                </tbody>
                </table>
             
            </div>
            <!-- aca termina la tabla de Proyecto-->

              <!-- aca termina la tabla de comentarios   style="border: 1px solid black;"-->
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
                    
                @foreach ($proyecto->comentarios as $comentario )  
             
                <tbody class="thead-light" value="{{$x++}}">
                      <tr>
                      <th scope="row">{{$i+$x}}</th>
                        <td> {{$comentario->user->name}}</td>
                        <td>  {{$comentario->user->surname." ".$comentario->user->surname2}}</td>
                        <td>{{$comentario->descripcion}}</td>
                        <td> <a href="{{route("Dmensaje",["id"=>$comentario->id])}}"> <img src="{{asset('img/Delet.png')}}" alt=""> </a> </td>
                      </tr>               
                @endforeach
                </tbody>
                </table>
            </div>
            <!-- aca termina la tabla de comentarios-->
            <div class="tab-pane container fade" id="menuDonacciones{{$i ?? ''}}">
                <p>Donacciones</p>
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
                @foreach ($proyecto->donaciones as $donacion)                        
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
            <div class="tab-pane container fade" id="menuSolicitudes{{$i ?? ''}}">
         
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
 
               
            @foreach ($proyecto->solicitudes as $solicitud)                
            <tbody class="thead-light" value="{{$x++}}">
                  <tr>            
                  <th scope="row">{{$i+$x}}</th>              
                    <td> {{$solicitud->trabajadorx->user2->name}}</td>               
                    <td>  {{$solicitud->trabajadorx->user2->surname." ".$solicitud->trabajadorx->user2->surname2}}</td>                
                    <td>{{$solicitud->descripcion}}</td>                   
                    <td>  <button id="{{$solicitud->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>                 
                  </tr>                       
            @endforeach
            </tbody>
            </table>
            </div>
     <!-- aca termina la tabla de Solicitud-->                 
         </div>
     </div>
              <div class="card-footer"     >



</div>


</div>
<br><br>

@endforeach






</div>
</div>

@endsection
