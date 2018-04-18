<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Modelos\ControlCalidad\FT_FICHA;
use Illuminate\Http\Request;

class FichaTecnicaController extends Controller
{
    public function index(){

    	
        $ficha=DB::Connection()->select("SELECT FI.id,FI.ARTICULO,AR.DESCRIPCION,FI.FAMILIA 
        FROM
        IBERPLAS.FT_FICHA FI,
        IBERPLAS.ARTICULO AR
        WHERE 
        FI.ARTICULO=AR.ARTICULO");

       

    	return view('ControlCalidad.index', ['ficha' => $ficha]);

    }
}
