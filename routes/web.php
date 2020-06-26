<?php

use App\Proyecto;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//6:33  360
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//donar
Route::get('/home/donar/{proyecto}', 'HomeController@donar')->name('donar');
Route::post('/home/donar/donar2', 'HomeController@donar2')->name('donar2');
Route::post('/home/donar/{proyecto}', 'HomeController@donar')->name('donarx');

//user
Route::get('/configuracion', 'Usercontroller@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
//use foto proyecto
Route::get('/images/avatar/{filename}', 'UserController@getImage2')->name('images.avatar');

//crear un proyecto
Route::post('/createProyect', 'ProyectController@create')->name('Cproject2');
Route::get('/createProyect', 'ProyectController@index')->name('Cproject');
Route::get('/viewProyect', 'Usercontroller@getProyect')->name('Vproject');
Route::get('/createJobs', 'ProyectController@indexJobs')->name('Cjob');
//mis proyectos favoritos
Route::get('/favoriteProyect', 'ProyectController@favorite')->name('favoriteProyect');


//cargo
Route::post('/createCargo', 'ProyectController@createCargo')->name('Ccargo');
//solicitud
Route::get('/createSolicitud/{cargo}', 'ProyectController@createSolicitud')->name('Csolicitud');
//solicitud enviada por el creador del proyecto
Route::post('/createSolicitud2', 'ProyectController@createSolicitud2')->name('Csolicitud2');
//aceptar solicitud de otro
Route::get('/createSolicitud3/{solicitud}', 'ProyectController@createSolicitud3')->name('Csolicitud3');

//delete solicitud
Route::get('/deleteeSolicitud/{id}', 'UserController@deleteSolicitud')->name('Dsolicitud');

//contratar
Route::get('/viewProyect/contratar/{solicitud}', 'SolicitudController@ASolicitud')->name('Asolicitud');
//eliminar Trabajador de proyecto
Route::get('/viewProyect/Despedir/{trabajadorDeProyecto}', 'Trabajador_proyectoController@DeleTrabajador')->name('EliminarTrabajadroProyecto');

//mostrar proyecto
Route::post('/tables', 'Usercontroller@tables')->name('dbm');
Route::get('/tableMaster', 'Usercontroller@master')->name('dbmaster');
Route::get('/tableMaster2', 'Usercontroller@master2')->name('dbmaster2');

//registrase cvomo trabajador
Route::get('/createEmployee', 'Usercontroller@trabajador')->name('Ctrabajador');
Route::post('/createEmployee/save', 'UserController@saveEmployee')->name('save.employee');
//borrarme como trabajador
Route::get('/deleteEmployee/{id}', 'Usercontroller@deleteEmploye')->name('Dtrabajador');
//mostrar trabajador
Route::get('/ViewEmployee', 'HomeController@Employe')->name('Vemployee');

//like
Route::get('/voto/{proyecto_id}', 'LikeController@like')->name('voto');
//dislike
Route::get('/dislike/{proyecto_id}', 'LikeController@dislike')->name('dislike');
//mi perfil
Route::get('/perfil/{user_if?}', 'UserController@perfil')->name('VPerfil');
//otro perfil
Route::get('/perfil2/{OtroUser}', 'UserController@Otroperfil')->name('VPerfil2');
//ingresar un comentario
Route::post('/comentario', 'ProyectController@crearMensaje')->name('Cmensaje');
//eliminar comentario
Route::get('/comentarioDelet/{id}', 'ProyectController@deletMensaje')->name('Dmensaje');