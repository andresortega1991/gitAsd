@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10" value="{{$i=0}}">
      
      @if(session('message'))
      <div class="alert alert-success" >
         {{  session('message') }}
      </div>
      @endif





        <div class="card" >   
            <div class="card-header">           
                 <ul class="nav nav-tabs">
                    <li class="nav-item">
                         <a class="nav-link active"  href="{{route('Vproject')}}">Todos mis Proyectos Creados </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Cjob')}}">Solicitud de trabajo </a>
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
    
@foreach ( $proyectos as $proyecto ) 
    <div class="card" value="{{$i++}}">   
    <div class="card-header">           
         <ul class="nav nav-tabs">
            <li class="nav-item">
                 <a class="nav-link active" data-toggle="tab" href="#home{{$i}}">{{$proyecto->nombre." "}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menuDescripcion{{$i}}">Objetivo</a>
            </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#menuEditar{{$i}}">Editar Proyecto</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#AceptarTrabajador{{$i}}">Ver peticiones de trabajadores </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#VerTrabajador{{$i}}">Ver mi equipo de trabajadores </a>
        </li>
         </ul>
    </div>   
    <div class="card-body">
              <!-- Tab panes -->
         <div class="tab-content">
            <div class="tab-pane container active" id="home{{$i}}">
                @include('includes.avatar')
                             
               @if ($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                @endif



            </div>
            <div class="tab-pane container fade" id="menuDescripcion{{$i}}">
                     <p>{{$proyecto->objetivo}}</p>
                     <p>{{$proyecto->alcance->descripcion}}</p>
                     <p>{{$proyecto->descripcion}}</p>
            </div>
  <div class="tab-pane container fade" id="menuEditar{{$i ?? ''}}">
                <table class="table">
   <thead>
     <tr>
       <th scope="col">*</th>
       <th scope="col">Dato de Proyecto</th>
       <th scope="col">Actualizar</th>
       <th scope="col">Eliminar</th>
     
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>Objetivo  </th>
       <td>{{$proyecto->objetivo}}</td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
     
     </tr>
     <tr>
       <td>Alcance </th>
       <td><p>{{$proyecto->alcance->descripcion}}</p></td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
       
     </tr>
     <tr>
       <td>Descripción  </th>
       <td> <p>{{$proyecto->descripcion}}</p></td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
       <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
       
     </tr>
     <tr>
         <td>Capital Necesario  </th>
         <td> <p>{{$proyecto->capitalNecesario  }}</p></td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
         
       </tr>
       <tr>
         <td>Fecha  </th>
         <td><p>{{$proyecto->fecha }} </p></td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
         
       </tr>
       <tr>
         <td>Categoria</th>
         <td>  <p>{{$proyecto->categoria->descripcion }} </p></td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>
         
       </tr>
       <tr>
         <td value="{{$monto=0}}">Bolsas</td>

        @foreach ( $proyecto->donaciones as $donacione)
        
          <p value="{{$monto+=$donacione->monto}}  "></p>   
          @endforeach
          <td>    {{$monto}}</td>
          <td>  <button id="{{$proyecto->id}}" type="button" class="btn btn-warning">Editar</button> </td>
         <td>  <button id="{{$proyecto->id}}" type="button" class="btn  btn-danger">Eliminar</button> </td>        
       </tr>
      
    
   </tbody>
 </table>
 
             </div>
<!-----  acacacacca--------->
<div class="tab-pane container fade" id="AceptarTrabajador{{$i ?? ''}}">
<div class="accordion" id="accordionExample" value="{{$x =1}}">
   <!--aca el for--->
  
       
 @foreach ( $proyecto->solicitudesx as $solicitud )
  
@if($solicitud->estado_id==1)

<div class="card" >
    <div class="card-header" id="headingOne{{$i}}{{$x}}">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}{{$x}}" aria-expanded="false" aria-controls="collapseOne">
           
            {{$proyecto->nombre}} &nbsp; &nbsp; &nbsp;  {{'  Cargo a postular : '}} &nbsp;{{$solicitud->cargo2->descripcion}}
            
           
          </button>
        </h2>
      </div>
  
    <div id="collapseOne{{$i}}{{$x}}" class="collapse " aria-labelledby="headingOne{{$i}}{{$x}}" data-parent="#accordionExample">
        <div class="card-body">
         
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Link a su perfil</th>
                <th scope="col">Contratar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
             
                <th scope="row">{{$solicitud->trabajadorx->user2->name}} </th>
              
              <!----aca los botoners--->
                <td>{{$solicitud->trabajadorx->user2->surname.' '.$solicitud->trabajadorx->user2->surname2}} </td>
                <td>    <a value="{{$proyecto}}" class="btn btn-lg btn-block btn-agora" href="{{route('donar',['proyecto'=>$proyecto])}}"  >Ver perfil</a>  </td>
                <td>    <a value="{{$solicitud}}" class="btn btn-lg btn-block btn-agora" href="{{route('Asolicitud',['solicitud'=>$solicitud])}}"  >Contratar</a></td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--   {{{$x++}}}-->
    @endif
    @endforeach
   
 <!----aca el 2 for--->

  </div>
</div>
<div class="tab-pane container fade" id="VerTrabajador{{$i}}">

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Cargo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $proyecto->trabajadoresx as $tp )
      <tr>
      <th scope="row">{{$tp->trabajador->user2->name}}</th>
        <td>{{$tp->trabajador->user2->surname.''.$tp->trabajador->user2->surname2}}</td>
      <td>{{$tp->cargo->descripcion}}</td>
        <td>    <a  class="btn btn-lg btn-block btn-agora" href="{{route('EliminarTrabajadroProyecto',['trabajadorDeProyecto'=>$tp ])}}"  >Despedir a usuario</a>  </td>
      </tr>
     
      @endforeach
      
     
    </tbody>
  </table>





</div>
<!---   acaaaaaa--->

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