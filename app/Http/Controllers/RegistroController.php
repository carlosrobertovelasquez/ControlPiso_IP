<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ControlPiso\CP_ENCABEZADOPLANIFICACION;
use App\Modelos\ControlPiso\CP_DETALLEPLANIFICACION;
use App\Modelos\ControlPiso\CP_CLAVE_MO;
use App\Modelos\Softland\OP_OPERACION;
use App\Modelos\ControlPiso\CP_REGISTROHORAS;
use App\Modelos\ControlPiso\CP_REGISTROEMPLEADOS;
use App\Modelos\Softland\EMPLEADO;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class RegistroController extends Controller
{
    public function index(){
         $OrdenProduccion=CP_ENCABEZADOPLANIFICACION::wherein('ESTADO',['A','B'])->get();
        return view('ControPiso.Transacciones.Registro.index')
               ->with('OrdenProduccion',$OrdenProduccion);
    }
    public function mo($id,$id2)
    {
 
        $encabezado=CP_ENCABEZADOPLANIFICACION::where('ID','=',$id)->get()->first();
        $detalle=CP_DETALLEPLANIFICACION::where('ENCABEZADOPLANIFICADOR_ID','=',$id)->get();
        $operacion=OP_OPERACION::where('ORDEN_PRODUCCION','=',$id2)->get();
        $clave_mo=CP_CLAVE_MO::all();
        $registrohoras=CP_REGISTROHORAS::all();
        
    	 return view('ControPiso.Transacciones.Registro.mo')
         ->with('operacion',$operacion)
         ->with('encabezado',$encabezado)
         ->with('detalle',$detalle)
         ->with('clave_mo',$clave_mo)
         ->with('registrohoras',$registrohoras);
    }

    public function listarhoras($id,$id2,$id3){

     $registrohoras=CP_REGISTROHORAS::
     where('ORDENPRODUCCION','=',$id)
     ->where('TURNO','=',$id2)
     ->where('OPERACION','=',$id3)->get() ;
    
      return view('ControPiso.Transacciones.Registro.lista_horas')  
      ->with('registrohoras',$registrohoras); 
    }

      public function listaremple($id,$id2,$id3){

     $registroempleados=CP_REGISTROEMPLEADOS::
     where('ORDENPRODUCCION','=',$id)
     ->where('TURNO','=',$id2)
     ->where('OPERACION','=',$id3)->get() ;
    
      return view('ControPiso.Transacciones.Registro.lista_empleados')  
      ->with('registroempleados',$registroempleados); 
    }




    public function agregar(Request $request){

       $date = carbon::now();
             $date = $date->format('d-m-Y H:i:s');
     
     $opera=CP_CLAVE_MO::where('CLAVE','=',$request->id_clave)->get();

     
     foreach ($opera as $opera) {
         
         $opera1=$opera->OPERACION;
     }

     
     $registrohoras=new CP_REGISTROHORAS;
 
     $registrohoras->ORDENPRODUCCION=$request->norden;
     $registrohoras->TURNO=$request->id_turno;
     $registrohoras->FECHA=$request->id_fecha;
     $registrohoras->OPERACION=$request->id_operacion;
     $registrohoras->OPERA=$opera1;
     $registrohoras->HORAINICIO=$request->hora1;
     $registrohoras->HORAFIN=$request->hora2;
     $registrohoras->TIEMPO=$request->horatotal;
     $registrohoras->CLAVE=$request->id_clave;
     $registrohoras->COMENTARIOS=$request->comentarios;
     $registrohoras->USUARIOCREACION=\Auth::user()->name;
     $registrohoras->FECHACREACION=$date;
     $registrohoras->save();

    }

    public function agregaremple(Request $request){

       $date = carbon::now();
             $date = $date->format('d-m-Y H:i:s');
     
     $opera=CP_CLAVE_MO::where('CLAVE','=',$request->id_clave)->get();

     
     foreach ($opera as $opera) {
         
         $opera1=$opera->OPERACION;
     }

     
     $registroemple=new CP_REGISTROEMPLEADOS;
 
     $registroemple->ORDENPRODUCCION=$request->norden;
     $registroemple->TURNO=$request->id_turno;
     $registroemple->FECHA=$request->id_fecha;
     $registroemple->OPERACION=$request->id_operacion;
     $registroemple->EMPLEADO=$request->searchempleado;
     $registroemple->NOMBRE=$request->nombre;
     $registroemple->ROL=$request->id_rol;
     $registroemple->USUARIOCREACION=\Auth::user()->name;
     $registroemple->FECHACREACION=$date;
     $registroemple->save();

    }





    public function eliminar(Request $request,$id){

     
      
      
        $horas=CP_REGISTROHORAS::where('ID','=',$id)->delete();
       // return response()->json(['message'=> $horas->CLAVE.'Fue eliminado Corretamente']);
      

    }

    public function eliminaremple(Request $request,$id){

     
      
      
        $horas=CP_REGISTROEMPLEADOS::where('ID','=',$id)->delete();
       // return response()->json(['message'=> $horas->CLAVE.'Fue eliminado Corretamente']);
      

    }

 
    public function buscarempleado(Request $request){

     $term=$request->term;
     $data=EMPLEADO::where ('EMPLEADO','LIKE','%'.$term.'%')
     ->orwhere('NOMBRE','LIKE','%'.$term.'%')
     ->where('ACTIVO','=','S')
     ->take(5)
     ->get();
     $result=array();
     foreach ($data as $data) {
         $result[]=['id'=>$data->NOMBRE,'value'=>$data->EMPLEADO];
     }

     return response()->json($result);

    }
    public function ma($id)
    {

    	 return view('ControPiso.Transacciones.Registro.ma');
    }

    public function impresion($id)
    {

    	 return view('ControPiso.Transacciones.Registro.impresion');
    }
    
}
