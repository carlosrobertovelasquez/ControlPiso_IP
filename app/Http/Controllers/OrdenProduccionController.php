<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Softland\CP_TCargaOrdenProduccion;
use App\Modelos\Softland\PEDIDO;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;
use App\Modelos\ControlPiso\CP_CALENDARIO_PLANIFICADOR;
use App\Modelos\ControlPiso\CP_CALENDARIO_PLANIFICADOR_DETALLE;
use App\Modelos\ControlPiso\CP_TEMP_PLANIFICACION;
use App\Modelos\ControlPiso\CP_TEMP_PLANIFICACION_ENCA;
use App\Modelos\ControlPiso\CP_ENCABEZADOPLANIFICACION;
use App\Modelos\ControlPiso\CP_DETALLEPLANIFICACION;
use App\Modelos\ControlPiso\CP_PLANIFICACION;
use App\Modelos\Softland\ESTRUC_PROCESO;
use App\Modelos\Softland\EQUIPO;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class OrdenProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
    {
     
        if(!\Session::has('cart'))\Session::put('cart',array());
    }

    public function index()
    {
       
        $OrdenProduccion=CP_TCargaOrdenProduccion::whereColumn('CANTIDAD_ARTICULO','>','CANTIDAD_PRODUCCI')->get();
        return view('ControPiso.Transacciones.listado_orden_produccion')
               ->with('OrdenProduccion',$OrdenProduccion);
        //
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Text';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function planificacion(  $id){
   
         CP_TEMP_PLANIFICACION::where('USUARIOCREACION','=',\Auth::user()->name )
         ->delete();
        CP_TEMP_PLANIFICACION_ENCA::where('USUARIO','=',\Auth::user()->name )
         ->delete();




          $ordenproduccion=CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION', $id)->first();;

           $articulordproduccion=$ordenproduccion->ARTICULO;

           

          $pedido=PEDIDO::where('ESTADO','=','A')->orderby('PEDIDO','asc')->get();



          //$centrocosto=CP_EQUIPOARTICULO::where('ARTICULO','=',$articulordproduccion)->get();

          $centrocosto=ESTRUC_PROCESO::selectRaw('SECUENCIA,DESCRIPCION,OPERACION')->where('ARTICULO','=',$articulordproduccion)
       ->Groupby('SECUENCIA','DESCRIPCION','OPERACION')->get();
      
    
         
          

         return view('ControPiso.Transacciones.planificacion')
         ->with('ordenproduccion',$ordenproduccion)
         ->with('pedido',$pedido)
         ->with('centrocosto',$centrocosto);


    }

    public function ConsultaPedidos(Request $request,$id){

        
        $pedido=PEDIDO::where('PEDIDO','=',$id)->get();
         return   json_encode ($pedido);

        


    }

    public function ConsultaMaquina($id){
    
    //$id=maquinaria,$id2=articulo
     
      $centrocosto=CP_EQUIPOARTICULO::
      where('ID','=',$id)->
      get();
     

      return json_encode($centrocosto);

    }



    public function planificar($id,$id4,$id5,$id6,$id3,Request $request){
        

    $normal =$request->normal;

    $secuencia=$request->id_secuencia;
    $orden=$request->norden;
    $cantidadxhora=$request->idm_cantidadxh;
    
    $hora=date('H',strtotime($id5) );
    $min=date('i',strtotime($id5) );
      
   
      
        $fechaActual=Carbon::now();

        $nueva=date('d-m-Y', strtotime($id4));
        $nueva2=date('Y-m-d', strtotime($id4));
        




       // consultar si existe registros en la tabla de transacciones para obtener el ultimo correlativo segun maquina y operacion
         

        $core=DB::Connection()->select("select ID from IBERPLAS.CP_CALENDARIO_PLANIFICADOR_detalle
                                      where fecha='$nueva2' and DATEPART(HOUR,hora)='$hora'");




        foreach ($core as $core) {
          
          $valorinicial=$core->ID+1;
        }


              

         $equipo=CP_EQUIPOARTICULO:: where('ID','=',$id6)->get();

         foreach ($equipo as $value) {
           $equipo=$value->EQUIPO;
         }
        

 

       //revisar si hay disponibilaid este fecha
       
       $disponi=DB::Connection()->select("select * from IBERPLAS.CP_CALENDARIO_PLANIFICADOR_DETALLE
                                          where 
                                           ID  in(
                                          select calendario_id from IBERPLAS.CP_DETALLEPLANIFICACION
                                          where centrocosto='$equipo')");
      

     

        if(count($disponi)>0){
          $mensaje=1;
          return $mensaje;
        } else
        {
         
          $inicioturno=$valorinicial;

          
          if (is_null($normal)){

          $arr=array($request->lunes,$request->martes,$request->miercoles,$request->jueves,$request->viernes,$request->sabado,$request->domingo,);
           $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr,$id3,$id6,$id4,$secuencia,$orden,$cantidadxhora);

          }else{

           $arr=array('N');
           $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr,$id3,$id6,$id4,$secuencia,$orden,$cantidadxhora);
          }

       
             
         return   json_encode ($turnosasigados);
        }
        
    }

    


    public function calcularTurnos($id,$inicioturno,$arr,$id3,$id6,$id4,$secuencia,$orden,$cantidadxhora){


         CP_TEMP_PLANIFICACION::where('USUARIOCREACION','=',\Auth::user()->name )
         ->where('operacion','=',$id3)->delete();
         
         CP_TEMP_PLANIFICACION_ENCA:: where('usuario','=',\auth::user()->name)
         ->where('operacion','=',$id3)->delete();

         $centrocosto=CP_EQUIPOARTICULO::where ('ID','=',$id6)->get();
         

         foreach ($centrocosto as $centrocosto) {
           
           $equipo=$centrocosto->EQUIPO;
         }



         $tempo=CP_TEMP_PLANIFICACION::max('calendario_id');

         if($tempo>0){
             if(count($arr)==1){
                $turnos2=CP_CALENDARIO_PLANIFICADOR_DETALLE::whereNull('ESTADO')
                ->where('ID','>',$tempo)
                ->where('TIPO','=','N')
                ->get();

              }else{

              $lunes=implode(",",$arr);
      //dd($arr);

              $turnos2=CP_CALENDARIO_PLANIFICADOR_DETALLE::whereNull('ESTADO')
              ->where('ID','>',$tempo)
              ->whereIN('dia',$arr)
              ->get();        

       }


         }else{


                if(count($arr)==1){
               $turnos2=CP_CALENDARIO_PLANIFICADOR_DETALLE::whereNull('ESTADO')
                ->where('ID','>=',$inicioturno)
                ->where('TIPO','=','N')
                ->get();

             }else{

             $lunes=implode(",",$arr);
            //dd($arr);

             $turnos2=CP_CALENDARIO_PLANIFICADOR_DETALLE::whereNull('ESTADO')
                ->where('ID','>=',$inicioturno)
                ->whereIN('dia',$arr)
                ->get();        

       }


      }
      
      // Consultar Tabla donde registro el detalle de la planificacion para  no incluir aquellos correlativos que ya han sido reervados ejemplo mantenimiento y otros.
      // 

       
       
     
         
      


     
         
          $conta=0;              
          $vcantidad=0;
          

         foreach ($turnos2 as $turnos) {
  

             $conta=$conta+1;
             if($conta==$id+1){
                
               break;


             } else{
              


  
   
                $plantemp=new CP_TEMP_PLANIFICACION;
      $plantemp->hora=$turnos->hora;
      $plantemp->orden=$turnos->orden;
      $plantemp->turno=$turnos->turno;
      $plantemp->fecha=$turnos->fecha;
      $plantemp->operacion=$id3;
      $plantemp->centrocosto=$equipo;
      $plantemp->secuencia=$secuencia;
      $plantemp->calendario_id=$turnos->ID;
      $plantemp->orden_prod=$orden;
      $plantemp->cantidadxhora=$cantidadxhora;
      $plantemp->USUARIOCREACION=\Auth::user()->name;
        $plantemp->save();




              //$turnosasigados[]= $turnos2;
              //$turnosasigados[]= $valor;
              
             }
            
         }


     $usuario=\Auth::user()->name;

     $turnosasigados=DB::Connection()->select("select min(calendario_id) as Horaini,MAX(calendario_id) as HoraFin,count(orden) as horas,sum(cantidadxhora) as cantidad,turno,fecha,operacion,centrocosto,secuencia  
from IBERPLAS.CP_TEMP_PLANIFICACION
where  
USUARIOCREACION='$usuario' group by turno,fecha,operacion,centrocosto,secuencia order by  secuencia,operacion, fecha,turno");
        
          CP_TEMP_PLANIFICACION_ENCA:: where('usuario','=',\auth::user()->name)
         ->delete();



        foreach ($turnosasigados as $turnos) {
          
          $encatemp=new CP_TEMP_PLANIFICACION_ENCA;
          $encatemp->horaini=$turnos->Horaini;
          $encatemp->horafin=$turnos->HoraFin;
          $encatemp->horas=$turnos->horas;
          $encatemp->cantidad=$turnos->cantidad;
          $encatemp->turno=$turnos->turno;
          $encatemp->fecha=$turnos->fecha;
          $encatemp->operacion=$turnos->operacion;
          $encatemp->centrocosto=$turnos->centrocosto;
          $encatemp->secuencia=$turnos->secuencia;
          $encatemp->USUARIO=\Auth::user()->name;
          $encatemp->save();
          $conta=$conta+1;
        }

        
       
      // actualizar horas en temporal
      // recorremos la tabla de encabezado tempral
      // 
      $encatem= CP_TEMP_PLANIFICACION_ENCA::get();
      
      

           foreach ($encatem as $value) {

            $horaini=$value->horaini;
            $horafin=$value->horafin;
            $thoraini=CP_CALENDARIO_PLANIFICADOR_DETALLE::where ('ID','=',$horaini)->select('hora','fechahora')->get();
            $thorafin=CP_CALENDARIO_PLANIFICADOR_DETALLE::where ('ID','=',$horafin)->select('hora','fechahora')->get();

         
             foreach ($thoraini as $value) {

               //$nueva2=date('Y-m-d', strtotime($id4));
               $hora=$value->hora;
               $fhora=date('Y-d-m H:i:s',strtotime($value->fechahora));
                           CP_TEMP_PLANIFICACION_ENCA::where('horaini','=',$horaini)->update(['thoraini'=>$hora,'fhoraini'=>$fhora]);
             }

              foreach ($thorafin as $value) {
               $hora=$value->hora;
               $fhora=date('Y-d-m H:i:s',strtotime($value->fechahora));
                           CP_TEMP_PLANIFICACION_ENCA::where('horafin','=',$horafin)->update(['thorafin'=>$hora,'fhorafin'=>$fhora]);
             }

           }

         
         $turnosasigados= CP_TEMP_PLANIFICACION_ENCA::get();        


        return $turnosasigados;

    }






    public function guardar_planificacion(Request $request){

            //$Inputs=Input::all();
            //
            
            //Dias de la semana 
            $lunes=$request->lunes;
            $martes=$request->martes;
            $miercoles=$request->miercoles;
            $jueves=$request->jueves;
            $viernes=$request->viernes;
            $sabado=$request->sabado;
            $domingo=$request->domingo;

            $normal=$request->normal;

            




           
                   


        
              $date = carbon::now();
             $date = $date->format('d-m-Y H:i:s');

             
              $fechaplanificada=$request->id_fecha;
              $fechaplanificada=date("d-m-Y", strtotime($fechaplanificada)) ;

               $maximo=CP_PLANIFICACION::max('id');

               if($maximo==null){
                $maximo=1;
               }
              
             $encatem=CP_TEMP_PLANIFICACION_ENCA::all();
             
             foreach ($encatem as $value) {
               
               $fechai=$value->fhoraini;
               $fechaf=$value->fhorafin;

               $fechai=date("Y-d-m H:i:s",strtotime($fechai));
               $fechaf=date("Y-d-m H:i:s",strtotime($fechaf));
               $planificacion=new CP_ENCABEZADOPLANIFICACION  ;  
             
                $planificacion->ordenproduccion=$request->norden;
                $planificacion->pedido=$request->id_pedido;
                $planificacion->articulo=$request->articulo;
                $planificacion->horaini=$value->horaini;
                $planificacion->horafin=$value->horafin;
                $planificacion->thoraini=$value->thoraini;
                $planificacion->thorafin=$value->thorafin;
                $planificacion->fhoraini=$fechai;
                $planificacion->fhorafin=$fechaf;
                $planificacion->horas=$value->horas;
                $planificacion->cantidad=$value->cantidad;
                $planificacion->turno=$value->turno;
                $planificacion->fecha=$value->fecha;
                $planificacion->operacion=$value->operacion;
                $planificacion->centrocosto=$value->centrocosto;
                $planificacion->secuencia=$value->secuencia;
                $planificacion->estado='P';
                $planificacion->USUARIOCREACION=\Auth::user()->name;
                $planificacion->FECHACREACION=$date;
                $planificacion->save();
             

              } 

          



             
            

             

            // Grabamos el detalle de planificacion
                  $nueva=date('d-m-Y', strtotime($request->id_fecha));


                 $orden_cantidad=CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION','=',$request->norden)->get();

                
                 foreach ($orden_cantidad as $orden_cantidad) {
                      
                      $cantidad=$orden_cantidad->CANTIDAD_PRODUCCI;
                      $cantidad2=$cantidad+$request->id_cantidadaproducir;
                    }   
                 
                 

                 CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION','=',$request->norden)->update(['CANTIDAD_PRODUCCI'=>$cantidad2]);




          
               
               $detalleplanificacion=new CP_DETALLEPLANIFICACION;
               
               

                

             
            
                    
               $tempdetalle=CP_TEMP_PLANIFICACION::all();

               foreach ($tempdetalle as $value) {
                
                $detall=new CP_DETALLEPLANIFICACION;
                 $detall->calendario_id=$value->calendario_id;
                 $detall->orden_prod=$value->orden_prod;
                 $detall->hora=$value->hora;
                 $detall->orden=$value->orden;
                 $detall->turno=$value->turno;
                 $detall->fecha=$value->fecha;
                 $detall->operacion=$value->operacion;
                 $detall->centrocosto=$value->centrocosto;
                 $detall->secuencia=$value->secuencia;
                 $detall->cantidadxhora=$value->cantidadxhora;
                 $detall->USUARIOCREACION=\Auth::user()->name;
                 $detall->FECHACREACION=$date;
                 $detall->save();



                }              


           CP_TEMP_PLANIFICACION_ENCA::where('USUARIO','=',\Auth::user()->name )
         ->delete();
         CP_TEMP_PLANIFICACION::where('USUARIOCREACION','=',\Auth::user()->name )
         ->delete();
               

          $plan=DB::Connection()->select("select operacion ,ordenproduccion,articulo,MIN(fecha) as fechamin ,MAX(fecha) as fechamax,SUM(cantidad) as cantidad,centrocosto ,pedido
            from IBERPLAS.CP_ENCABEZADOPLANIFICACION
            where ordenproduccion='$request->norden'
            group by operacion,ordenproduccion,articulo,secuencia,centrocosto,pedido
            order by secuencia");

           foreach ($plan as $value) {
            $plan2=new CP_PLANIFICACION;
            $plan2->operacion=$value->operacion;
            $plan2->ordenproduccion=$value->ordenproduccion;
            $plan2->articulo=$value->articulo;
            $plan2->fechamin=$value->fechamin;
            $plan2->fechamax=$value->fechamax;
            $plan2->cantidad=$value->cantidad;
            $plan2->centrocosto=$value->centrocosto;
            $plan2->pedido=$value->pedido;
            $plan2->estado='P';
            $plan2->USUARIOCREACION=\Auth::user()->name;
            $plan2->FECHACREACION=$date;
            $plan2->save();

             
           }

              //ESTADOS P=PLANIIFICACO,A=EN PROCESO,B=FINALIZADA,C=CERRADA,D=LIQUIDADA


              $iddetalle=DB::Connection()->select("select operacion,FECHACREACION 
                          from IBERPLAS.CP_ENCABEZADOPLANIFICACION 
                          where planificacion_id is null
                          group by operacion ,FECHACREACION");
 

            
              foreach ($iddetalle as $value) {

                $operacion=$value->operacion;
                $fecha=$value->FECHACREACION;


                $idpla=CP_PLANIFICACION::where('operacion','=',$operacion)->where('FECHACREACION','=',$date)->select('id')->get();

                 foreach ($idpla as $value) {

                   
                   $id=$value->id;
                   CP_ENCABEZADOPLANIFICACION::where('operacion','=',$operacion)->where('FECHACREACION','=',$date)->update(['planificacion_id'=>$id]);
                   
                 }
                
              }



              

               
     return redirect()->route('planificador.index');
               //borrar cart
              
        
        
    }

  public function disponibilidadturnos($corre,$maquina)
  {
  
  }
    
}
