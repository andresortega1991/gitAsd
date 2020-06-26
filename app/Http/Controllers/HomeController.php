<?php

namespace App\Http\Controllers;

use App\Donacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Trabajador;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $i = 0;
        $proyectos = Proyecto::orderby('id', 'desc')->paginate(5);
        //$phone = User::find(1)->proyecto; https://laravel.com/docs/7.x/pagination#paginating-eloquent-results
        return view('home', [
            'proyectos' => $proyectos,
            '$i' => $i
        ]);
    }

    public function donar($proyecto)
    {


        $proyecto2 = Proyecto::find($proyecto);
        //var_dump($proyecto2);
        // die();
        return view('proyecto.donar', [
            'proyecto' => $proyecto2
        ]);
    }

    public function donar2(Request $request)
    {




        $user = Auth::user();
        $user_id = $user->id;
        //    var_dump($user_id);
        //   echo '<br>';
        $proyecto_id  =  $request->input('id');
        //  var_dump($proyecto_id);
        //   echo '<br>';
        $name  =  $request->input('name');
        //  var_dump($name);
        //   echo '<br>';
        $usuario  =  $request->input('usuario');
        // var_dump($usuario);
        //  echo '<br>';
        $MetodoPago  =  $request->input('MetodoPago');
        // var_dump($MetodoPago);
        // echo '<br>';
        $monto  =  $request->input('capital');
        // var_dump($monto);


        $validatedData = $request->validate([
            'id' => 'required',
            'MetodoPago' => 'required',
            'capital' => 'required|numeric|integer|min:4',

        ]);
        $mensaje = 'Se a realizado con éxito la donación';
        $proyecto2 = Proyecto::where('id', $proyecto_id)->get()->first();
        if ($monto > 999) {
            // var_dump($monto);   
            $donacion = new Donacion();
            $donacion->user_id = $user_id;
            $donacion->proyecto_id = $proyecto_id;
            $donacion->monto =  $monto;
            $donacion->descripcion_pago = $MetodoPago;
            $donacion->save();
            return  view('proyecto.donar', [
                'proyecto' => $proyecto2,
                'message' => $mensaje
            ]);
        } else {
            $mensaje = 'Ingrese un valor valido';
            redirect()->route('donar', ['proyecto' => $proyecto2])->with([
                'message' => $mensaje
            ]);
        }


        $mensaje = 'Error';
        redirect()->route('donarx', ['proyecto' => $proyecto2])->with([
            'message' => $mensaje
        ]);


        return view('proyecto.donar', ['proyecto' => $proyecto2])->with([
            'messageAlerta' => "Error en el monto  ingresado"
        ]);
    }

    public function Employe()
    {

        $trabajador = Trabajador::orderby('id', 'asc')->paginate(5);;

        return view('user.workers', ['trabajadores' => $trabajador]);
    }
}