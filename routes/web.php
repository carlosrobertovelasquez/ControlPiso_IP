<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    //E-mail Verification
  
    Route::get('verify/{code}', ['uses'=>'UsuariosController@verify','as'=>'verify']);
    
    Route::get('/respuesta',function(){
        return view('ControPiso.response');
    });
	
	Route::get('/home', 'HomeController@index');
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::get('/listado_correo', 'UsuariosController@listado_correo');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');
  

    Route::post('crear_rol', 'UsuariosController@crear_rol')->middleware('permissionshinobi:crear_rol');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');
    
    
    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');


     
 Route::get('Equipo', 'EquipoController@index');
 Route::get('Equipo_agregar_articulo/{id}', ['uses'=>'EquipoController@agregar_articulo','as'=>'agregar_articulo']);
 Route::get('guardar_articulo', ['uses'=>'EquipoController@guardar_articulo','as'=>'guardar_articulo']);
 Route::get('listar_equipo_articulo/{id}', ['uses'=>'EquipoController@listar_equipo_articulo','as'=>'listar_equipo_articulo']);
 Route::get('listar_equipo_articulo2/{id}', ['uses'=>'EquipoController@listar_equipo_articulo2','as'=>'listar_equipo_articulo2']);
 Route::get('autocomplete-ajaxequipo', ['uses'=>'EquipoController@autoComplete','as'=>'autocomplete.ajaxequipo']);
 Route::get('opera_equipo', ['uses'=>'EquipoController@opera_equipo','as'=>'opera_equipo']);
 Route::get('editarArticuloCentrocosto/{id}', ['uses'=>'EquipoController@editarArticuloCentrocosto','as'=>'editarArticuloCentrocosto']);
 Route::get('ListarArticuloOperacion', ['uses'=>'EquipoController@ListarArticuloOperacion','as'=>'ListarArticuloOperacion']);

  Route::get('Produccion','OrdenProduccionController@index');
Route::get('ConsultaProduccion',['uses'=>'OrdenProduccionController@ConsultaProduccion', 'as'=>'ConsultaProduccion']);  
  //planificador
 Route::get('Planificacion/{id}', ['uses'=>'OrdenProduccionController@planificacion','as'=>'planificacion']);
Route::get('planificar/{id}/{id4}/{id5}/{id6}', ['uses'=>'OrdenProduccionController@planificar','as'=>'planificar']);
Route::get('guardar_planificacion', ['uses'=>'OrdenProduccionController@guardar_planificacion','as'=>'guardar_planificacion']);

 Route::get('ConsultaPedidos/{id}',['uses'=>'OrdenProduccionController@ConsultaPedidos', 'as'=>'ConsultaPedidos']);
Route::get('ConsultaMaquina',['uses'=>'OrdenProduccionController@ConsultaMaquina', 'as'=>'ConsultaMaquina']);
Route::get('ConsultaMaquina02/{id}/{id2}',['uses'=>'OrdenProduccionController@ConsultaMaquina02', 'as'=>'ConsultaMaquina02']);
Route::get('viajero/{id}',['uses'=>'OrdenProduccionController@viajero', 'as'=>'viajero']);

//Maestros/Claves
 Route::get('clave',['uses'=>'ClaveController@index', 'as'=>'clave.index']);
 

//Transacciones/planificador
 Route::get('planificador',['uses'=>'PlanificarController@index', 'as'=>'planificador.index']);
 Route::get('planificador/estadop/{id}', ['uses'=>'PlanificarController@estadoP', 'as'=>'planificar.estadoP']) ;
 Route::get('planificador/estadoa/{id}', ['uses'=>'PlanificarController@estadoA', 'as'=>'planificar.estadoA']) ;
 Route::get('planificador/estadob/{id}', ['uses'=>'PlanificarController@estadoB', 'as'=>'planificar.estadoB']) ;
 



//Transacciones/Registro MO-MA
Route::get('registro',['uses'=>'RegistroController@index', 'as'=>'registro.index']);
Route::get('registro/mo/{id}/{id2}',['uses'=>'RegistroController@mo', 'as'=>'registro.mo']);
Route::get('registro/ma/{id}/{id2}',['uses'=>'RegistroController@ma', 'as'=>'registro.ma']);
Route::get('registro/impresion/{id}/{id2}',['uses'=>'RegistroController@impresion', 'as'=>'registro.impresion']);
Route::get('registro/listarhoras',['uses'=>'RegistroController@listarhoras', 'as'=>'registro.listarhoras']);
Route::get('registro/listaremple',['uses'=>'RegistroController@listaremple', 'as'=>'registro.listaremple']);
Route::get('registro/totalhoras',['uses'=>'RegistroController@totalhoras', 'as'=>'registro.totalhoras']);
Route::get('registro/tiempoPerdido',['uses'=>'RegistroController@tiempoPerdido', 'as'=>'registro.tiempoPerdido']);
Route::get('registro/horasTrabajadas',['uses'=>'RegistroController@horasTrabajadas', 'as'=>'registro.horasTrabajadas']);
Route::get('registro/metaxTurno',['uses'=>'RegistroController@metaxTurno', 'as'=>'registro.metaxTurno']);
Route::get('registro/horasplanificadas',['uses'=>'RegistroController@horasplanificadas', 'as'=>'registro.horasplanificadas']);
Route::get('registro/aprobar/{id2}',['uses'=>'RegistroController@aprobar', 'as'=>'registro.aprobar']);

Route::get('registro/agregar/',['uses'=>'RegistroController@agregar', 'as'=>'registro.agregar']);
Route::get('registro/agregaremple/',['uses'=>'RegistroController@agregaremple', 'as'=>'registro.agregaremple']);
Route::get('registro/agregarproduccion/',['uses'=>'RegistroController@agregarproduccion', 'as'=>'registro.agregarproduccion']);
Route::get('registro/eliminar/{id}',['uses'=>'RegistroController@eliminar', 'as'=>'registro.eliminar']);
Route::get('registro/eliminaremple/{id}',['uses'=>'RegistroController@eliminaremple', 'as'=>'registro.eliminaremple']);
Route::get('registro/buscarempleado/', ['uses'=>'RegistroController@buscarempleado','as'=>'registro.buscarempleado']);


//turno
  Route::get('Turno', ['uses'=>'TurnosController@index','as'=>'Turno.index']);
  Route::get('Turno/detalle/{id}', ['uses'=>'TurnosController@DetalleTurno','as'=>'Turno.detalle']);
 

 Route::resource('cargaEventos', 'CalendarController'); 
//Route::get('cargaEventos{id?}','CalendarController@index');
Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));
Route::post('actualizaEventos','CalendarController@update');
Route::post('eliminaEvento','CalendarController@delete');



Route::get('invoice','InvoiceController@index');
Route::get('invoice/add','InvoiceController@add');
Route::get('Ticket' ,'OrdenProduccionController@Ticket');
Route::get('ConsultarTicket/{id}',['uses'=>'OrdenproduccionController@consultaticket','as'=>'ConsultarTicket']);

//Gantt
//
Route::get('gantt','GanttController@index');
Route::get('gantt/data','GanttController@get');


//Scheduler
Route::get('scheduler','SchedulerController@index');
Route::get('scheduler/data','SchedulerController@get');


//pedidos

Route::get('ventas','VentasController@index');


//CONTROLA CALIDAD
Route::get('insertado','FichaTecnicaController@insertado');
Route::get('bolillos','FichaTecnicaController@bolillo');
Route::get('extrusion','FichaTecnicaController@extrusion');
Route::get('ficha_tecnicaInsertado/{id}',['uses'=>'FichaTecnicaController@FichaTecnicaInsertado','as'=>'Ficha_TecnicaInsertado']);
Route::get('ficha_tecnicaBolillo/{id}',['uses'=>'FichaTecnicaController@FichaTecnicaBolillo','as'=>'Ficha_TecnicaBolillo']);
Route::get('ficha_tecnicaExtrusion/{id}',['uses'=>'FichaTecnicaController@FichaTecnicaExtrusion','as'=>'Ficha_TecnicaExtrusion']);
});




