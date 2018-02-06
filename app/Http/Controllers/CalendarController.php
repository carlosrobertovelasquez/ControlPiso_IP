<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ControlPiso\CP_DETALLEPLANIFICACION;
use App\Modelos\ControlPiso\CP_ENCABEZADOPLANIFICACION;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Calendar;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
      
     $maquina=0;

     if($request->id_centrocosto==null or $request->id_centrocosto==0 ){

      $maquina=0;
      $data=CP_ENCABEZADOPLANIFICACION::all();

    
     }else{

     $data=CP_ENCABEZADOPLANIFICACION::where('centrocosto','=',$request->id_centrocosto)->get();
     $maquina=$request->id_centrocosto;
     }


      $events=[];
     // dd($data);
      if($data->count()){
        foreach ($data as $key=> $value) {
            $events[]=Calendar::event(
                 $value->centrocosto,
                 false,
                 new \DateTime($value->fhoraini),
                 new \DateTime($value->fhorafin),
                 null,

                   [
                        'color'=>$value->COLOR,
                        'url' => 'pass here url and any route',
                ]

                 
                 
            );

        }
      }



      $calendar=Calendar::addEvents($events);

      
/*
        $data = array();

         //declaramos un array principal que va contener los datos
        $id = Fullcalendareventos::all()->pluck('id'); //listamos todos los id de los eventos
        $titulo = Fullcalendareventos::all()->pluck('titulo'); //lo mismo para lugar y fecha
        $fechaIni = Fullcalendareventos::all()->pluck('fechaIni');
        $fechaFin = Fullcalendareventos::all()->pluck('fechaFin');
        $allDay = Fullcalendareventos::all()->pluck('todoeldia');
        $background = Fullcalendareventos::all()->pluck('color');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
 

         $demo=Fullcalendareventos::all();
        dd($demo);
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                //"borderColor"=>$borde[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
 
        json_encode($data); //convertimos el array principal $data a un objeto Json 
       return $data; //para luego retornarlo y estar listo para consumirlo
       
       */
 

        $centrocosto=CP_EQUIPOARTICULO::all();   
        return view('ControPiso.Transacciones.calendario',['maquina'=>$maquina], compact('calendar','centrocosto'));
  
    }

    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];

        //Insertando evento a base de datos
        $evento=new CalendarioEventos;
        $evento->fechaIni=$start;
        //$evento->fechaFin=$end;
        $evento->todoeldia=true;
        $evento->color=$back;
        $evento->titulo=$title;

        $evento->save();
   }

   public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];

        $evento=CalendarioEventos::find($id);
        if($end=='NULL'){
            $evento->fechaFin=NULL;
        }else{
            $evento->fechaFin=$end;
        }
        $evento->fechaIni=$start;
        $evento->todoeldia=$allDay;
        $evento->color=$back;
        $evento->titulo=$title;
        //$evento->fechaFin=$end;

        $evento->save();
   }

   public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        CalendarioEventos::destroy($id);
   }
}
