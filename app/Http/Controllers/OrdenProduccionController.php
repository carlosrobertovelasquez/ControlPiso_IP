<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Softland\CP_TCargaOrdenProduccion;
use App\Modelos\Softland\PEDIDO;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;
use App\Modelos\ControlPiso\CP_CALENDARIO_PLANIFICADOR;
use App\Modelos\ControlPiso\CP_ENCABEZADOPLANIFICACION;
use App\Modelos\ControlPiso\CP_DETALLEPLANIFICACION;
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
   

          $ordenproduccion=CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION', $id)->first();;

           $articulordproduccion=$ordenproduccion->ARTICULO;

           

          $pedido=PEDIDO::where('ESTADO','=','A')->orderby('PEDIDO','asc')->get();



          $centrocosto=CP_EQUIPOARTICULO::where('ARTICULO','=',$articulordproduccion)->get();

         

          

         return view('ControPiso.Transacciones.planificacion')
         ->with('ordenproduccion',$ordenproduccion)
         ->with('pedido',$pedido)
         ->with('centrocosto',$centrocosto);


    }

    public function ConsultaPedidos(Request $request,$id){

        
        $pedido=PEDIDO::where('PEDIDO','=',$id)->get();
         return   json_encode ($pedido);

        


    }

    public function ConsultaMaquina($id,$id2){
    
    //$id=maquinaria,$id2=articulo
     
      $centrocosto=CP_EQUIPOARTICULO::
      where('EQUIPO','=',$id)->
      where('ARTICULO','=',$id2)
      ->get();
     

      return json_encode($centrocosto);

    }



    public function planificar($id,$id4,$id5,$id6,Request $request){
        

    $normal =$request->normal;





      

      
        $fechaActual=Carbon::now();

        $nueva=date('d-m-Y', strtotime($id4));
        $nueva2=date('Y-d-m', strtotime($id4));
        

        $dia=$fechaActual->format('Y-m-d');
        $ano=$fechaActual->format('Y');
        $hora=$fechaActual->toTimeString();
        
       $disponi=DB::Connection()->select("select * from ibertplastic.IBERPLAS.CP_CALENDARIO_PLANIFICADOR
                                          where 
                                          FECHA>='$nueva2'
                                          and TURNO='$id5'
                                          and ID  in(
                                          select CALENDARIOPLANIFICADOR_ID from ibertplastic.IBERPLAS.CP_DETALLEPLANIFICACION
                                          where MAQUINA='$id6')");

      

   


    

       $turno=CP_CALENDARIO_PLANIFICADOR::
              where('FECHA','=',$nueva)->
              where('TURNO','=',$id5)
              ->get();  


             
            

        if(count($disponi)>0){
          $mensaje=1;
          return $mensaje;
        } else
        {
          foreach ($turno as $turno) {
            $nuevoturno=$turno->ID;
          }
          $inicioturno=$nuevoturno;

          if (is_null($normal)){

          $arr=array($request->lunes,$request->martes,$request->miercoles,$request->jueves,$request->viernes,$request->sabado,$request->domingo,);
           $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr);

          }else{

           $arr=array('N');
           $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr);
          }
             
         return   json_encode ($turnosasigados);
        }
        
    }

    


    public function calcularTurnos($id,$inicioturno,$arr){


       if(count($arr)==1){
         $turnos2=CP_CALENDARIO_PLANIFICADOR::whereNull('ESTADO')
          ->where('ID','>=',$inicioturno)
          ->where('TIPO','=','N')
          ->get();

       }else{

       $lunes=implode(",",$arr);
      //dd($arr);

       $turnos2=CP_CALENDARIO_PLANIFICADOR::whereNull('ESTADO')
          ->where('ID','>=',$inicioturno)
          ->whereIN('dia',$arr)
          ->get();        

       }
       
     
         
      


     
         
          $conta=0;              
         

         foreach ($turnos2 as $turnos2) {
             $conta=$conta+1;
             if($conta==$id+1){
                
               break;


             } else{
              $turnosasigados[]= $turnos2;
              
             }
            
         }
        
   

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


              


             $planificacion=new CP_ENCABEZADOPLANIFICACION  ;           
            
                 
                
                $planificacion->ORDENPRODUCCION=$request->norden;
                $planificacion->ARTICULO=$request->articulo;
                $planificacion->CANTIDADAPRODUCIR=$request->cantidadaproducir;
                $planificacion->PEDIDO=$request->id_pedido;
                $planificacion->MAQUINA=$request->id_centrocosto;
                $planificacion->PIEZASXHORA=$request->piezaxhora;
                $planificacion->PIEZAXTURNO=$request->piezaxturno;
                $planificacion->CANTIDADXTURNO=$request->cantidadturnos;
                $planificacion->FECHAPLANIFICADA=$fechaplanificada;
                $planificacion->USUARIOCREACION=\Auth::user()->name;
                $planificacion->FECHACREACION=$date;
                $planificacion->ESTADO='P';
                $planificacion->TURNOSPLANIFICADOS=$request->id_turno;
                $planificacion->save();

            // Grabamos el detalle de planificacion
                  $nueva=date('d-m-Y', strtotime($request->id_fecha));


                 $orden_cantidad=CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION','=',$request->norden)->get();

                 foreach ($orden_cantidad as $orden_cantidad) {
                      
                      $cantidad=$orden_cantidad->CANTIDAD_PRODUCCI;
                      $cantidad2=$cantidad+$request->cantidadaproducir;
                    }   
                 
                 CP_TCargaOrdenProduccion::where('ORDEN_PRODUCCION','=',$request->norden)->update(['CANTIDAD_PRODUCCI'=>$cantidad2]);



               $turno=CP_CALENDARIO_PLANIFICADOR::
              where('FECHA','=',$nueva)->
              where('TURNO','=',$request->id_turno)
              ->get();     

  
                 foreach ($turno as $turno) {
                     $nuevoturno=$turno->ID;
                        }
        
                     $inicioturno=$nuevoturno;
                     $id=$request->cantidadturnos;
        
                    if (is_null($normal)){

                       $arr=array($request->lunes,$request->martes,$request->miercoles,$request->jueves,$request->viernes,$request->sabado,$request->domingo,);
                        $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr);

                    }else{

                        $arr=array('N');
                        $turnosasigados=$this->calcularTurnos($id,$inicioturno,$arr);
                     }
        
                 
                              
        
                 
               





               $detalleplanificacion=new CP_DETALLEPLANIFICACION;
               
               

                

               $maximo=CP_ENCABEZADOPLANIFICACION::where('ESTADO','P')->max('ID');
            
         
               

               //Product::with( 'urls','prices')->where('user_id', '=', $id)->min('cost')->get();

               $cantidadturnos=$request->cantidadturnos;

                 $turno=0;
                 $tcantidad=0;
              


               foreach ($turnosasigados as $turnosasigados ) {
                    
                    $turno=$turno+1;

                if($cantidadturnos==$turno){
                 
                  $cantidad=$request->cantidadaproducir-$tcantidad;
                }else{
                $cantidad=$request->piezaxturno;
                    
                }
                $tcantidad=$tcantidad+$cantidad;

                
                



                CP_DETALLEPLANIFICACION::create([
                 
                   # code...
                'ENCABEZADOPLANIFICADOR_ID'=>$maximo,
                'CALENDARIOPLANIFICADOR_ID'=>$turnosasigados->ID,
                'MAQUINA'=>$request->id_centrocosto,
                'NUMERO'=>$turnosasigados->ID,
                'CORRELATIVO'=>$turnosasigados->CORE,
                'TURNO'=>$turnosasigados->TURNO,
                'ESTADO'=>'P',
                'COLOR'=>$request->color,
                'FECHAINICIO'=>date("d-m-Y H:i:s", strtotime($turnosasigados->HORA_INICIO)),
                'FECHAFIN'=>date("d-m-Y H:i:s", strtotime($turnosasigados->HORA_FIN)),
                'CANTIDADAPRODUCIR'=>$cantidad,    
                'USUARIOCREACION'=>\Auth::user()->name,
                'FECHACREACION'=>$date
                //$detalleplanificacion->save();
                
                 ]);
               }
               

              //ESTADOS P=PLANIIFICACO,A=EN PROCESO,B=FINALIZADA,C=CERRADA,D=LIQUIDADA

               
     return redirect()->route('planificador.index');
               //borrar cart
              
        
        
    }

  public function disponibilidadturnos($corre,$maquina)
  {
  
  }
    
}
