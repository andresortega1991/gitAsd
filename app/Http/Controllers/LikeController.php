<?php

namespace App\Http\Controllers;
use App\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($proyecto_id){
     
        $user= Auth::user();
  
        $isset_like = Voto::where('user_id',$user->id)
                                ->where('proyecto_id',(int)$proyecto_id)
                                ->count();

  if($isset_like==0){

        $voto = new Voto();
        $voto->user_id=$user->id;
        $voto->proyecto_id=(int)$proyecto_id;
        $voto->save();
       // var_dump($voto);
       return response()->json([
           'voto'=>$voto
           ]);
  }else{
      echo'ya existe ';
      return response()->json([
        'message'=>'ya existe'
        ]);
  }       

    }
    public function dislike($proyecto_id){
        $user= Auth::user();
  
        $voto = Voto::where('user_id',$user->id)
                                ->where('proyecto_id',(int)$proyecto_id)
                                ->first();

  if($voto){
        $voto->delete();
       // var_dump($voto);
       return response()->json([
           'voto'=>$voto,
           'message'=>'ya eliminado'
           ]);
  }else{
      echo'ya existe ';
      return response()->json([
        'message'=>'no existe'
        ]);
  }       
    }
}