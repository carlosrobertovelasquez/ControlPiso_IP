<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Softland\RUBRO_LIQ;
use App\Modelos\Softland\ARTICULO;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;
use App\Modelos\Softland\ESTRUC_PROCESO;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Response;
use Illuminate\Http\Response;

class EquipoController extends Controller
{
     public function index()
    {

        $Equipo=RUBRO_LIQ::all();
        $Articulo=Articulo::orderby('ARTICULO')->get();



        return view('ControPiso.Maestros.Equipos.listado_equipo', ['Equipo' => $Equipo], ['Articulo' => $Articulo]);
    }

    public function agregar_articulo($id)
    {

        $Equipo=RUBRO_LIQ::findOrFail($id);
        $Articulo=Articulo::orderby('DESCRIPCION','asc')->get();

    return view('ControPiso.Maestros.Equipos.Equipo_articulo', ['Equipo' => $Equipo], ['Articulo' => $Articulo]);

    }


    public function listar_equipo_articulo2($id){

          $equipoarticulo=CP_EQUIPOARTICULO::where('ID','=',$id)->get();
          
         return view('ControPiso.Maestros.Equipos.edit')->with('equipoarticulo',$equipoarticulo);

    }

    public function opera_equipo(Request $request){
    
       $id=$_GET['id'];

       $equipo=ESTRUC_PROCESO::selectRaw('SECUENCIA,DESCRIPCION')->where('ARTICULO','=',$id)
       ->Groupby('SECUENCIA','DESCRIPCION')->get();
      
      return response()->json($equipo);
    

    }

    public function guardar_articulo(Request $request){


      $equi=CP_EQUIPOARTICULO:: where('ARTICULO','=',$request->id_articulo)
                                ->where('OPERACION','=',$request->operacion)
                                ->where('EQUIPO','=',$request->id_equipo)->first();

  if(count($equi)>=1){
    Flash::success('Ya Existe la Relacion Centro Costo-Articulo')->warning();
  }else{

    $equipo=new CP_EQUIPOARTICULO;
      $equipo->equipo=$request->id_equipo;
      $equipo->articulo=$request->id_articulo;
      $equipo->piezasxhoras=$request->piezasxhora;
      $equipo->hora_holgurasxdia=$request->horasholgurapordia;
      $equipo->num_cavidades=$request->numcavidades;
      $equipo->CICLO_SEG_MAQUINA=$request->ciclosegunMaquinas;
      $equipo->num_operadores=$request->numoperarios;
      $equipo->DESC_EQUIPO=$request->desc_equipo;
      $equipo->COLOR=$request->color;
      $equipo->OPERACION=$request->operacion;
      $equipo->TIEMPOMOLDE=$request->tiempoCambiarMolde;

        $equipo->save();
     Flash::success('Se ha registrado de Forma Existosa')->important();    
    
  }


   



           return redirect('Equipo');


    }


    public function listar_equipo_articulo($id){

    	$equipoarticulo=CP_EQUIPOARTICULO::where( 'EQUIPO',$id)->get();

    	 return view('ControPiso.Maestros.Equipos.listar_equipo_articulo', ['equipoarticulo' => $equipoarticulo]);
    }


    public function autoComplete(Request $request){

    $term=$request->term;
    $items=ARTICULO::where('ARTICULO','LIKE','%'.$term.'%')->
                     orwhere('DESCRIPCION','LIKE','%'.$term.'%')->take(5)->get();
    if(count($items)==0){
        $searchResult[]='No Existe Item';
    }else{
        foreach ($items as $query) {
           // $searchResult[]=$value->ARTICULO;
            $searchResult[] = [ 'id' => $query->ARTICULO, 'value' => $query->ARTICULO.' '.$query->DESCRIPCION ];
        }
    }



   // return $searchResult;
    return Response()->json($searchResult);
    /*

     return $availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];


*/

    function procesoArticulo(){

    }

    }

  public function editarArticuloCentrocosto(Request $request,$id){

    CP_EQUIPOARTICULO::
                 where('id',$id)
                 ->update(['OPERACION'=>$request->operacion,
                          'NUM_CAVIDADES'=>$request->numcavidades,
                          'PIEZASXHORAS'=>$request->piezasxhora,
                          'CICLO_SEG_MAQUINA'=>$request->ciclosegunMaquinas,
                          'HORA_HOLGURASXDIA'=>$request->horasholgurapordia,
                          'NUM_OPERADORES'=>$request->numoperarios,
                          'TIEMPOMOLDE'=>$request->tiempoCambiarMolde ]);
     Flash::success('Se Actualizo en Forma Existosa')->important();               
       
       return redirect('Equipo');

  }

  public function ListarArticuloOperacion(Request $request){
    $id1=$_GET['art'];
    $id2=$_GET['ope'];
    $articulooperacion=CP_EQUIPOARTICULO::selectRaw('ID,EQUIPO,DESC_EQUIPO,PIEZASXHORAS,TIEMPOMOLDE')-> where('ARTICULO','=',$id1)->where('OPERACION','=',$id2)->get();
    
      return   json_encode ($articulooperacion);
     
  }
}
