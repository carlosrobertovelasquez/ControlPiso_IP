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


class PlanificarController extends Controller
{

    public function __construct()
    {
    	Carbon::setlocale('es');
    }	
   public function index(){
         $OrdenProduccion=CP_ENCABEZADOPLANIFICACION::wherein('ESTADO' , ['P','A','B'])->get();
         //->whereIn('ESTADO', ['P', 'A', 'B','C'])->get();
        return view('ControPiso.Transacciones.Planificador.index')
               ->with('OrdenProduccion',$OrdenProduccion);

   }


  public function estadoP($id){

    $fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
       $planificar=CP_ENCABEZADOPLANIFICACION::where('ID',$id)->update(['ESTADO'=>'A']);
      
      
        
       
       return redirect()->route('planificador.index');


  
  }

  public function estadoA($id)
  {


       $fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
      $planificar=CP_ENCABEZADOPLANIFICACION::where('ID',$id)->update(['ESTADO'=>'B']);
      
      
        
       
      return redirect()->route('planificador.index');
    }






  public function estadoB($id)
  {
$fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
    $planificar=CP_ENCABEZADOPLANIFICACION::where('ID',$id)->update(['ESTADO'=>'C']);
      
      
        
       
       return redirect()->route('planificador.index');
  }
  
}
