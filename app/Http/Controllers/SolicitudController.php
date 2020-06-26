<?php

namespace App\Http\Controllers;
use App\Solicitud;
use App\Trabajador_proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function ASolicitud($solicitud){
        echo'<br>  solicitud id  <br>';
       
        
        //esto esta malo
        $idx=(int)$solicitud;
        
        $solicitudes= Solicitud::all();
        
        foreach($solicitudes as $soli){
            var_dump($soli->id);
            var_dump($idx);
            if($soli->id == $idx){
           $solicitud=$soli;
          
            }
        }

        echo'<br>  solicitud id  <br>';
        var_dump($solicitud->id);
        echo'<br>  solicitud proyecto_id  <br>';
        var_dump($solicitud->proyecto_id);
        echo'<br>  solicitud trabajador_id  <br>';
        var_dump($solicitud->trabajador_id);
        echo'<br>  solicitud persona name  <br>';
        var_dump($solicitud->trabajadorx->user2->name);
        echo'<br>  solicitud cardo_id <br>';
        var_dump($solicitud->cargotrabajador_id );

      

        $todas_trabajadores_proyecto=Trabajador_proyecto::get();
        $verificacion=0;
        foreach($todas_trabajadores_proyecto as $ttp){

            if($solicitud->trabajador_id == $ttp->trabajador_id ){
                $verificacion++;
            }
            
        }
echo'<br> aca la verificacion si o no tengo si es 1 si estoy en la lista <br>';
        echo $verificacion;
       
        if($verificacion==0){
        

        $trabajador_proyecto = new Trabajador_proyecto();
        $trabajador_proyecto->trabajador_id=$solicitud->trabajador_id;
        $trabajador_proyecto->proyecto_id=$solicitud->proyecto_id;
        $trabajador_proyecto->cargo_id =$solicitud->cargotrabajador_id ;
        $trabajador_proyecto->save();
        $idx=$solicitud->id;
        
        
    
        


        $solix = DB::table('solicitudes')
        ->where('cargotrabajador_id', $solicitud->cargotrabajador_id )
        ->get();

        foreach($solix as $s){
            echo'<br> aca el estado1 <br>';
            var_dump($s->estado_id);

            $ss = DB::table('solicitudes')
            ->where('id', $s->id)
            ->update(['estado_id' => 2]);

            $ssx = DB::table('cargotrabajador')
            ->where('id',$solicitud->cargotrabajador_id )
            ->update(['estado_id' => 10]);
            echo'<br> aca el estado 2 <br>';
            var_dump($s->estado_id);
        }
        $soli = DB::table('solicitudes')
        ->where('id', $solicitud->id)
        ->update(['estado_id' => 3]);

        return redirect()->route('Vproject')
        ->with([
            'message' => 'Has aceptado la solicitud correctamente!!'
        ]);
        }else{
            return redirect()->route('Vproject')
            ->with([
                'message' => 'Ya tiene una un trabajo este usuario!!'
            ]);
        }
    }
}