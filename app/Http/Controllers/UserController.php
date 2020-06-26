<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use App\User;
use App\Proyecto;
use App\Solicitud;
use App\Trabajador;
use App\Trabajador_proyecto;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        // Validación del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'surname2' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $date = $request->input('date');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario

        $user->name = $name;
        $user->surname = $surname;
        $user->surname2 = $surname2;
        $user->date = $date;
        $user->email = $email;

        // Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            // Poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            // Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }
        // Ejecutar consulta y cambios en la base de datos
        $user->update();
        return redirect()->route('config')
            ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function getImage2($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function getProyect()
    {

        $user = Auth::user();
        $id = $user->id;
        $proyectos = Proyecto::where('user_id', $id)->get();
        return view('proyecto.view', [
            'proyectos' => $proyectos,
        ]);
    }


    public function master()
    {
        $ruta = 'proyecto.view';
        $user = Auth::user();
        $tipo_user = $user->tipo_user;
        if ($tipo_user == ("admin")) {
            $ruta = 'admin.tables';
            $proyectos = Proyecto::orderby('id', 'desc')->get();
        }

        return view($ruta, [
            'proyectos' => $proyectos
        ]);
    }

    public function master2()
    {
        $ruta = 'proyecto.view';
        $user = Auth::user();


        $tipo_user = $user->tipo_user;


        if ($tipo_user == ("admin")) {
            $ruta = 'admin.tables2';
            $usuarios = User::orderby('id', 'asc')->get();
        }

        return view($ruta, [
            'usuarios' => $usuarios
        ]);
    }

    public function trabajador()
    {
        $user = Auth::user();

        foreach ($user->trabajador2 as $e) {
            $trabajador =  $e;
        }
        if(  isset( $trabajador)){
        return view('user.employee', [
            'trabajador' => $trabajador,
        ]);
        }else{
            $trabajador = new Trabajador();
            return view('user.employee', [
                'trabajador' => $trabajador,
            ]);
        }
    }

    public function saveEmployee(Request $request)
    {
        $user = Auth::user();
        foreach ($user->trabajador2 as $e) {
            $trabajador =  $e;
        }
        $validate = $this->validate($request, [
            'textarea' => 'required|string|between:5,500',        
        ]);

        $id=$user->id;
        $descripcion  = $request->input('textarea');
        $trabajadorx= Trabajador::where('user_id', $id)->get();
        $mensaje='';
        $count=0;

        foreach ($trabajadorx as $e) {
            $count++;
            $trabajadorx =  $e;
            echo'cada trabajador es';
            var_dump($trabajadorx);
            if(!isset($trabajadorx) ){               
            }else{          
            $mensaje = 'Ya existe su perfil de trabajador ';
            }      
        }
        
        if($count==0){
               $trabajador = new Trabajador();
                $trabajador->user_id = $user->id;
                $trabajador->descripcion = $descripcion;
                $trabajador->ccv = 'NULL';    
         
                $trabajador->save();
                $mensaje = 'Se creo su perfil de trabajador correctamente';
        }        
        return  redirect()->route('Ctrabajador',[
            'trabajador'=>$trabajador,           
        ])->with(['message'=>$mensaje]);
    }   
    
    public function perfil(){
        $user = Auth::user();

        $proyectos = Proyecto::where('user_id',$user->id)->get();
        return view('User.perfil',[
            'proyectos'=>$proyectos
        ]);
    }
    public function Otroperfil($OtroUser){
        $userAbuscar=(int)$OtroUser;
   
        $OtroUser=User::where("id",$userAbuscar)->get()->first();


        $proyectos =Proyecto::where('user_id',$OtroUser->id)->get();

       return view('User.perfil',[
           "OtroUser"=>$OtroUser,
           "proyectos"=>$proyectos
           ]);
    }

    public function deleteEmploye($id){
        $trabajador=(int)Trabajador_proyecto::where('trabajador_id',$id)->count();
        var_dump($trabajador);
        var_dump($id);
   
        if( $trabajador == 0) {
          
        
            Trabajador::destroy((int)$id);   
            return  redirect()->route('Ctrabajador',[
              
        ])->with('message', 'Su registro se elimino exitosamente!');
        }else{
            return  redirect()->route('Ctrabajador',[
              
                ])->with('message', 'Ustes pertenece a algún proyecto en ejecución contactece con algun administrador porfavor para más información.');
        };
        
        return  redirect()->route('Ctrabajador',[
              
            ])->with('message', 'Ustes pertenece a algún proyecto en ejecución contactece con algun administrador porfavor para más información.');        
 
 
        
  }
  public function deleteSolicitud($id){

    Solicitud::destroy((int)$id);   
    return  redirect()->route('Ctrabajador',[
              
        ])->with('message', 'Se elimino con exito su solicitud de trabajo'); 
  }
}