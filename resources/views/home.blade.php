@extends('layouts.app')

@section('content')

  <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-8" value="">           
   <!-----         prueba  ok  ----->
  @include('includes.chiches.modalss.modal',["proyectos"=>$proyectos])       
    <!-----         prueba  ok   ----->     
         @include('includes.message')
         <?php $i=0?>
         <div class="clearfix" style="margin-left: 268PX;">            
          {{$proyectos->links()}} 
         </div>
          <?php $indice=0 ?>
  <!-----         prueba  DE MENSAJE  ok ----->          
          @include('includes.message2')
            <!-----         prueba DE MENSAJE  ----->
           @foreach ( $proyectos as $proyecto ) 
           <?php $indice++ ?>
      
           <?php $i++ ?>
             @include('includes.proyectosView',['proyecto'=>$proyecto,'i'=>$i,'indice'=>$indice])
           @endforeach
           <div class="clearfix" style="margin-left: 268PX;">              
           {{$proyectos->links()}}          
          </div>
        </div>      
    </div >  
  </div>
@endsection
