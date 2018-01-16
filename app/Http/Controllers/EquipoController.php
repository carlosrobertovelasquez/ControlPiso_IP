<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Softland\EQUIPO;
use App\Modelos\Softland\ARTICULO;
use App\Modelos\ControlPiso\CP_EQUIPOARTICULO;

class EquipoController extends Controller
{
     public function index()
    {
       
        $Equipo=Equipo::all();
        $Articulo=Articulo::orderby('ARTICULO')->get();
         
       
        
        return view('ControPiso.Maestros.Equipos.listado_equipo', ['Equipo' => $Equipo], ['Articulo' => $Articulo]);
    }

    public function agregar_articulo($id)
    {
    	
        $Equipo=Equipo::findOrFail($id);
        $Articulo=Articulo::orderby('DESCRIPCION','asc')->get();

    return view('ControPiso.Maestros.Equipos.Equipo_articulo', ['Equipo' => $Equipo], ['Articulo' => $Articulo]);

    }


    private function listar_equipo_articulo2(){

        dd('hola');
    }

    public function guardar_articulo(Request $request){

       

    	

    	$equipo=new CP_EQUIPOARTICULO;
    	$equipo->equipo=$request->id_equipo;
    	$equipo->articulo=$request->search_text;
    	$equipo->piezasxhoras=$request->piezasxhora;
    	$equipo->hora_holgurasxdia=$request->horasholgurapordia;
    	$equipo->num_cavidades=$request->numcavidades;
    	$equipo->CICLO_SEG_MAQUINA=$request->ciclosegunMaquinas;
    	$equipo->num_operadores=$request->numoperarios;
    	$equipo->DESC_EQUIPO=$request->desc_equipo;
        $equipo->COLOR=$request->color;
    	

        $equipo->save();

          

           return redirect('Equipo');


    }


    public function listar_equipo_articulo($id){

    	$equipoarticulo=CP_EQUIPOARTICULO::where( 'EQUIPO',$id)->get();

    	 return view('ControPiso.Maestros.Equipos.listar_equipo_articulo', ['equipoarticulo' => $equipoarticulo]);
    }

    public function autoComplete(Request $request){

    $term=$request->term;
    $items=ARTICULO::where('ARTICULO','LIKE','%'.$term.'%')->get();
    if(count($items)==0){
        $searchResult[]='No Existe Item';
    }else{
        foreach ($items as $value) {
            $searchResult[]=$value->ARTICULO;
        }
    }

    return $searchResult;
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
        

    }
}
