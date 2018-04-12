<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Softland\CP_TCargaOrdenProduccion;
use App\Modelos\Softland\PEDIDO;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;
use App\Modelos\ControlPiso\CP_CALENDARIO_PLANIFICADOR;
use App\Modelos\ControlPiso\CP_ENCABEZADOPLANIFICACION;
use App\Modelos\ControlPiso\CP_DETALLEPLANIFICACION;
use App\Modelos\ControlPiso\CP_PLANIFICACION;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Modelos\ControlPiso\CP_emails;
use App\Mail\ComprasMail;



class PlanificarController extends Controller
{

    public function __construct()
    {
    	Carbon::setlocale('es');
    }	
   public function index(){
         $OrdenProduccion=CP_PLANIFICACION::wherein('estado' , ['P','A','B'])->get();
         //->whereIn('ESTADO', ['P', 'A', 'B','C'])->get();
     
          //envio correo aqui:
          

        return view('ControPiso.Transacciones.Planificador.index')
               ->with('OrdenProduccion',$OrdenProduccion);


   }


  public function estadoP($id){

    $fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
       $planificar=CP_PLANIFICACION::where('id',$id)->update(['estado'=>'A']);
      
         $emails=CP_emails::where('email01','=','S')->select('email')->get();
            Mail::to($emails)->send(new ComprasMail());
        
       
       return redirect()->route('planificador.index');


  
  }

  public function estadoA($id)
  {


       $fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
      $planificar=CP_PLANIFICACION::where('id',$id)->update(['estado'=>'B']);
      

           
      
        
       
      return redirect()->route('planificador.index');
    }






  public function estadoB($id)
  {
$fechaSistema = Carbon::now()->format('m-d-Y H:i:s');
    
    $planificar=CP_ENCABEZADOPLANIFICACION::where('ID',$id)->update(['ESTADO'=>'C']);
      
      
        
       
       return redirect()->route('planificador.index');
  }
  
}
