<?php

namespace App\Http\Controllers;

use App\Alcance;
use App\Cargotrabajador;
use App\Categoria_proyecto;
use App\Comentario;
use App\Proyecto;
use App\Solicitud;
use App\Trabajador;
use App\Trabajador_proyecto;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Exporter;


class ProyectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function xd()
    {

        $proyectos = Proyecto::orderby('id', 'desc')->get();

        $proyecto = Proyecto::find(1);

        // var_dump($proyecto);
        //  die();
        return view('home', [
            'proyectos' => $proyectos

        ]);
    }


    protected function index()
    {


        $categorias = Categoria_proyecto::get();

        // var_dump($categorias);

        $alcances = Alcance::get();
        return view('proyecto.create', [
            'alcances' => $alcances,
            'categorias' => $categorias,
        ]);
    }
    protected function index2()
    {
        return view('proyecto.view');
    }

    protected function create(Request $request)
    {
        $validated = $this->validate($request, [
            "image_path" => 'required|image',
            'alcance' => 'required',
            'inputGroupSelect01' => 'required|string|',
            'objetivo' => 'required|string|between:6,40',
            'descripcion' => 'required|string|max:500',
            'name' => 'required|string|max:40',
            'capital' => 'required|between:6,7',
            'date' => 'required|string|max:255',
        ]);
        $image_path = $request->file('image_path');
        $name = $request->input('name');
        $objetivo = $request->input('objetivo');
        $alcance = $request->input('alcance');
        $descripcion = $request->input('descripcion');
        $capital = $request->input('capital');
        $date = $request->input('date');
        $inputGroupSelect01 = $request->input('inputGroupSelect01');
        $user = Auth::user();
        $id = $user->id;
        // Asigno los valores a mi nuevo objeto a guardar
        $proyecto = new Proyecto();
        $proyecto->user_id  = $id;
        $proyecto->nombre = $name;
        $proyecto->objetivo = $objetivo;
        $proyecto->alcance_id = $alcance;
        $proyecto->descripcion = $descripcion;
        $proyecto->capitalNecesario = $capital;
        $proyecto->fecha = $date;
        $proyecto->categoria_id = $inputGroupSelect01;
        $proyecto->estado_id = '1';
        // Guardar en la bd
        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $proyecto->image_path = $image_path_name;
        }
        $proyecto->save();

        return redirect()->route('Cproject')
            ->with([
                'message' => 'Has creado tu proyecto correctamente!!'
            ]);
    }
    public function indexJobs()
    {
        $user = Auth::user();
        $id = $user->id;
        $proyectos = Proyecto::where('user_id', $id)->get();
        return view('proyecto.createJobs', [
            'proyectos' => $proyectos
        ]);
    }
    public function createCargo(Request $request)
    {

        $proyecto_id = $request->input('id');
        $descripcion = $request->input('cargo');
        $fecha_in = $request->input('date');
        $fecha_ter = $request->input('date2');
        $pago = $request->input('pago');

        $cargo = new Cargotrabajador();
        $cargo->proyecto_id = $proyecto_id;
        $cargo->descripcion = $descripcion;
        $cargo->fecha_in = $fecha_in;
        $cargo->fecha_ter = $fecha_ter;
        $cargo->estado_id = 9;
        $cargo->pago = $pago;


        $cargo->save();
        return redirect()->route('Cjob')
            ->with([
                'message' => 'Has creado tu cargo correctamente!!'
            ]);
    }

    public function createSolicitud($cargo)
    {
        var_dump((int) $cargo);

        $cargo = Cargotrabajador::where('id', (int) $cargo)->get()->first();
        echo '<br>cargo =' . $cargo;

        $user = Auth::user();
        $trabajador = Trabajador::where('user_id', $user->id)->get();
        echo '<br> trabajador= ' . $trabajador;
        foreach ($trabajador as $t) {
            $trabajador = $t;
        }
        if ($trabajador == null) {
            return redirect()->route('home')
                ->with([
                    'message' => 'Usteded nno es trabajador'
                ]);
        }
        $Tsolicitudes = Solicitud::get();
        $resultado = 0;
        foreach ($Tsolicitudes as $so) {
            echo '<br> solicitudes  <br>';
            echo '<br> ';
            var_dump($so->proyecto_id);
            echo '<br> ';
            var_dump($so->trabajador_id);
            echo '<br> ';
            echo '<br> proyecto  <br>';
            echo '<br> ';
            var_dump($cargo->proyecto_id);
            echo '<br> ';
            echo '<br> trabajador  <br>';
            var_dump($trabajador->id);
            echo '<br> ';
            if (($so->proyecto_id == $cargo->proyecto_id) && ($so->trabajador_id == $trabajador->id)) {

                $resultado++;
                echo '<br> ';
                echo 'encontre una solicitud ya en el proyecto te pille maldito usuario';
                echo '<br> ';
                if ($so->estado_id == 2) {
                    $resultado--;
                }
            }
        }
        echo ' <br> resultado <br>';
        echo $resultado;
        echo ' <br> resultado que hizo <br>';
        if ($resultado == 0) {
            //   echo 'entreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';

            $estado_id = 1;
            //   var_dump($estado_id);

            $solicitud = new Solicitud();
            $solicitud->proyecto_id = $cargo->proyecto_id;
            $solicitud->trabajador_id = $trabajador->id;
            $solicitud->cargotrabajador_id = $cargo->id;
            $solicitud->estado_id = $estado_id;

            $solicitud->save();

            return redirect()->route('home')
                ->with([
                    'message' => 'Has creado tu solicitud correctamente!!'
                ]);
        } else {
            // echo ' nooooooooooooooooooooooo entreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';

            return redirect()->route('home')
                ->with([
                    'message' => 'Ya tiene una solicitud en este proyecto!!'
                ]);
        }
    }

    public function favorite()
    {
        $user = Auth::user();
        return view('proyecto.favorite', [
            'votos' => $user->votos
        ]);
    }

    public function crearMensaje(Request $request)
    {

        $user = $request->input('user');
        $proyecto = $request->input('proyecto');
        $Comentario = $request->input('comentario');
        echo 'Usuario<br>';
        var_dump($user);
        echo '<br> proyecto <br>';
        var_dump($proyecto);
        echo '<br>';
        echo '<br> comentario <br>';
        var_dump($Comentario);

        $comentario = new Comentario();
        $comentario->user_id = (int) $user;
        $comentario->proyecto_id = (int) $proyecto;
        $comentario->descripcion = $Comentario;
        $comentario->save();
        $proyectos = Proyecto::orderby('id', 'desc')->get();

        return redirect()->route('home', [
            'proyectos' => $proyectos,
        ])->with('message2xxxxxxxxx', 'el Comentario se creo exitosamente!');;
    }

    public function deletMensaje($id)
    {


        Comentario::destroy((int) $id);

        $proyectos = Proyecto::orderby('id', 'desc')->get();
        return redirect()->route('home', [
            'proyectos' => $proyectos,
        ])->with('message2xxxxxxxxx', 'el Comentario se elimino exitosamente!');
    }

    public function createSolicitud2(Request $request)
    {
        $trabajadores = Trabajador::orderby('id', 'asc')->paginate(5);;
        $trabajador_id = $request->input('trabajador_id');
        $proyecto_id = $request->input('proyecto_id');
        $Cargo_id = $request->input('cargo_id');

        var_dump((int) $trabajador_id);
        var_dump((int) $proyecto_id);
        var_dump((int) $Cargo_id);



        $cargo = Cargotrabajador::find((int) $Cargo_id);
        var_dump($cargo->id);
        var_dump($cargo->estado_id);
        $resultado = 0;

        if ($cargo->estado_id == 10) {

            return redirect()->route('Vemployee', ['trabajadores' => $trabajadores,])
                ->with([
                    'message2xxxxxxxxx' => 'Este cargo esta ocupado'
                ]);
        }
        //---------------------------------------------------------------------------
        $Tsolicitudes = Solicitud::get();

        foreach ($Tsolicitudes as $so) {
            if (($so->proyecto_id == (int) $proyecto_id) && ($so->trabajador_id == (int) $trabajador_id)) {

                $resultado++;
                echo '<br> ';
                echo 'encontre una solicitud ya en el proyecto te pille maldito usuario';
                echo '<br> ';
                if ($so->estado_id == 2) {
                    $resultado--;
                }
            }
        }
        echo ' <br> resultado <br>';
        echo $resultado;
        echo ' <br> resultado que hizo <br>';

        if ($resultado == 0) {
            //   echo 'entreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';


            //   var_dump($estado_id);

            $solicitud = new Solicitud();
            $solicitud->trabajador_id = (int) $trabajador_id;
            $solicitud->proyecto_id = (int) $proyecto_id;
            $solicitud->cargotrabajador_id = $cargo->id;
            $solicitud->estado_id = 5;
            $solicitud->save();

            $solicitud->save();

            return redirect()->route('Vemployee', ['trabajadores' => $trabajadores,])
                ->with([
                    'message2xxxxxxxxx' => 'Has creado tu solicitud correctamente!!'
                ]);
        } else {
            // echo ' nooooooooooooooooooooooo entreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';

            return redirect()->route('Vemployee', ['trabajadores' => $trabajadores,])
                ->with([
                    'message2xxxxxxxxx' => 'Ya tiene una solicitud en este proyecto!!'
                ]);
        }
    }

    //----------------------------------------------------------------------
    public function createSolicitud3($solicitud)
    {

        $s = Solicitud::find($solicitud);

        $s = DB::table('solicitudes')
            ->where('id',  $s->id)
            ->update(['estado_id' => 1]);

        return redirect()->route('Ctrabajador',)
            ->with([
                'message' => 'Ya aceptaste solicitud de este proyecto!!'
            ]);
    }
}