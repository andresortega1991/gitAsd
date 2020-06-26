<?php $t=0 ?>

@foreach ( $proyectos as $proyecto )
<?php $t++ ?>
  
        @switch($t)

        @case($t == 1)
        @if(isset($proyecto))               
        <?php $p1=$proyecto ?>
        @endif
        @break

    
        @case($t == 2)
        @if(isset($proyecto))      
        <?php $p2=$proyecto ?>   
        @endif    
        @break


        @case($t == 3)
        @if(isset($proyecto))      
        <?php $p3=$proyecto ?>   
        @endif      
        @break


        @case($t == 4)
        @if(isset($proyecto))      
        <?php $p4=$proyecto ?>   
        @endif   
        @break


        @case($t == 5)
        @if(isset($proyecto))    
        <?php $p5=$proyecto ?>     
        @endif          
        @break

    @endswitch
  @endforeach     


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$p1->nombre}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
        @if(isset($p1))    
            <form method="post" action="{{route('Cmensaje')}}" enctype="multipart/form-data" >
              @csrf
              <div class="form-group row mb-0">
              <input required hidden  name="proyecto" id="proyecto" value="{{$p1->id}}" type="text">
              </div>
              <div class="form-group row mb-0">
              <input  required  hidden name="user" id="user" value="{{Auth::user()->id}}" type="text">
              </div>
              <div class="form-group row mb-2"> 
               <textarea required  name="comentario" id="comentario"  class="form-control" id="exampleFormControlTextarea1" placeholder="Ingrese comentario" rows="3"></textarea>
            </div>
         <!--- --->
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn "  style="background-color: rgb(240, 142, 54);">
                      Enviar comentario 
                  </button>
              </div>
          </div>
      </form>
        @endif 
      </div> 
      <div class="modal-footer">
     
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título del popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($p2))    
            <form method="post" action="{{route('Cmensaje')}}" enctype="multipart/form-data" >
              @csrf
              <div class="form-group row mb-0">
              <input required hidden  name="proyecto" id="proyecto" value="{{$p2->id}}" type="text">
              </div>
              <div class="form-group row mb-0">
              <input  required  hidden name="user" id="user" value="{{Auth::user()->id}}" type="text">
              </div>
              <div class="form-group row mb-2"> 
               <textarea required  name="comentario" id="comentario"  class="form-control" id="exampleFormControlTextarea1" placeholder="Ingrese comentario" rows="3"></textarea>
            </div>
         <!--- --->
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn "  style="background-color: rgb(240, 142, 54);">
                      Enviar comentario 
                  </button>
              </div>
          </div>
      </form>
        @endif 
      </div> 
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título del popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($p3))    
        <form method="post" action="{{route('Cmensaje')}}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group row mb-0">
          <input required hidden  name="proyecto" id="proyecto" value="{{$p3->id}}" type="text">
          </div>
          <div class="form-group row mb-0">
          <input  required  hidden name="user" id="user" value="{{Auth::user()->id}}" type="text">
          </div>
          <div class="form-group row mb-2"> 
           <textarea required  name="comentario" id="comentario"  class="form-control" id="exampleFormControlTextarea1" placeholder="Ingrese comentario" rows="3"></textarea>
        </div>
     <!--- --->
      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn "  style="background-color: rgb(240, 142, 54);">
                  Enviar comentario 
              </button>
          </div>
      </div>
  </form>
    @endif   
      </div> 
      <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título del popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($p4))    
        <form method="post" action="{{route('Cmensaje')}}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group row mb-0">
          <input required hidden  name="proyecto" id="proyecto" value="{{$p4->id}}" type="text">
          </div>
          <div class="form-group row mb-0">
          <input  required  hidden name="user" id="user" value="{{Auth::user()->id}}" type="text">
          </div>
          <div class="form-group row mb-2"> 
           <textarea required  name="comentario" id="comentario"  class="form-control" id="exampleFormControlTextarea1" placeholder="Ingrese comentario" rows="3"></textarea>
        </div>
     <!--- --->
      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn "  style="background-color: rgb(240, 142, 54);">
                  Enviar comentario 
              </button>
          </div>
      </div>
  </form>
    @endif 
      </div> 
      <div class="modal-footer">
     
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título del popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($p5))    
        <form method="post" action="{{route('Cmensaje')}}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group row mb-0">
          <input required hidden  name="proyecto" id="proyecto" value="{{$p5->id}}" type="text">
          </div>
          <div class="form-group row mb-0">
          <input  required  hidden name="user" id="user" value="{{Auth::user()->id}}" type="text">
          </div>
          <div class="form-group row mb-2"> 
           <textarea required  name="comentario" id="comentario"  class="form-control" id="exampleFormControlTextarea1" placeholder="Ingrese comentario" rows="3"></textarea>
        </div>
     <!--- --->
      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn "  style="background-color: rgb(240, 142, 54);">
                  Enviar comentario 
              </button>
          </div>
      </div>
  </form>
    @endif 
      </div> 
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>