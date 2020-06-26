<?php

namespace App\Http\Controllers;

use App\Trabajador_proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Trabajador_proyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function DeleTrabajador($trabajadorDeProyecto){  
        $idTrabajador=(Int)$trabajadorDeProyecto;
      //  var_dump($idTrabajador);
        $trabajador_Proyecto=Trabajador_proyecto::where('id',$idTrabajador)->get();
       // var_dump($trabajador_Proyecto);
        foreach($trabajador_Proyecto as $s){
            echo'<br> cargo id <br>';
        //    var_dump($s->cargo_id);
            echo'<br> cargo id <br>';
       //     var_dump($s->cargo->solictudes);
            $trabajador_p=$s;
        }

        foreach($trabajador_p->cargo->solictudes as $solicitud){
            echo'<br> solicitud <br>';
         //   var_dump($solicitud);

            echo'<br> cargo <br>';
            $ss = DB::table('cargotrabajador')
            ->where('id', $trabajador_p->cargo->id)
            ->update(['estado_id' => 9]);
            echo'<br> 1 query <br>';
          //  var_dump($ss);

            $ss = DB::table('solicitudes')
            ->where('id', $solicitud->id)
            ->update(['estado_id' => 1]);
            echo'<br> 1 query <br>';
          //  var_dump($ss);
            
            $ss = DB::table('trabajadores_proyecto')
            ->delete(['estado_id' => $idTrabajador]);
            echo'<br> 2 query <br>';
            //var_dump($ss);

        }

        return redirect()->route('Vproject')
        ->with([
            'message' => 'Ya elimino a este trabajador de su proyecto!!'
        ]);
      }        

     

    
}