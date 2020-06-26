@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" value="{{ $i=0 }}">

          @include('includes.message2')

            <div class="clearfix" style="margin-left: 268PX;">            
                {{$trabajadores->links()}} 
               </div>



            @foreach ($trabajadores as$t )
                
      
            <div class="card" value="{{ $i++ }}">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home{{ $i }}">Trabajador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menuDescripcion{{ $i }}">Enviar solicitud de trabajo</a>
                        </li>
                      
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home{{ $i }}">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Perfil</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">ccv</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <tr>
                                  <th scope="row">{{$i}}</th>
                             

                                 
                                    @if($t->userx->image)
                                  <td><a class="{{ session('message') ? 'is-invalid' : '' }}"  href="{{route('VPerfil2',['OtroUser'=> $t->userx])}}"> <div class="" style="  width: 35px;  height: 35px;  border-radius: 900px;  overflow: hidden;"> @include('includes.users.avatarUsers',['user'=>$t->userx]) </td>
                                    @else
                                    <td><a class="{{ session('message') ? 'is-invalid' : '' }}"  href="{{route('VPerfil2',['OtroUser'=> $t->userx])}}"> <div class="" style="  width: 35px;  height: 35px;  border-radius: 1px;  overflow: hidden;"><img src="{{asset('img/jpg-48.png')}}" alt=""> </td>  
                                    @endif
                                    <td>{{$t->user2->name." ".$t->user2->surname." ".$t->user2->surname2}}</td>
                                  <td><a href=""><img src=" {{asset('img/pdf-file-512 (1).png')}}" style="max-height:60px; "   ></a></td>
                                  </tr>
                                 </tbody>
                              </table>
                        </div>
                        <div class="tab-pane container fade" id="menuDescripcion{{ $i }}">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">Seleccionar Proyecto</th>
                                    <th scope="col">Seleccionar cargo</th>
                                   
                                 
                                  </tr>
                                </thead>

                                <tbody>
                                 
                                    @foreach (Auth::user()->proyecto as $p )
                                   
                                  
                                  <tr>
                                  <th scope="row">{{$i}}</th>                            
                                    <td>{{$p->nombre}}</td>
                                 
                                    <td>                                     
                                      <form method="POST" action="{{ route('Csolicitud2') }}">
                                        @csrf
                                        <div class="form-group">    
                                        <input hidden type="text" name="trabajador_id" id="trabajador_id" value="{{$t->id}}">
                                      </div>
                                        <div class="form-group">    
                                        <input hidden type="text" name="proyecto_id" id="proyecto_id" value="{{$p->id}}">
                                      </div>
                                        <div class="form-group">                                         
                                            <select value="" class="form-control" name="cargo_id" id="cargo_id" >
                                                  @foreach ($p->cargos as $c)                                                                                   
                                                  <option value="{{$c->id}}" id="cargo_id" >{{$c->descripcion }} </option>
                                                @endforeach                                               
                                            </select>
                                         </div>                                     
                                     
                                        <div class="form-group">  
                                        <button type="submit" class="btn btn-lg btn-block btn-agora">Enviar</button>
                                        </div>
                                      </form>
                                    </td> 
                                  </tr>
                                  <?php $i++  ?>
                                  @endforeach
                                
                                 </tbody>
                              </table>
                        </div>
                      
                 </div>
                </div>
                <div class="card-footer">
                   
                </div>
            </div>
<br> <br>
            @endforeach
            <div class="clearfix" style="margin-left: 268PX;">            
                {{$trabajadores->links()}} 
               </div>
        </div>
    </div>
</div>

@endsection
