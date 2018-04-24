<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Modelos\ControlCalidad\FT_FICHA;
use App\Modelos\ControlCalidad\FT_INSERTADO;
use App\Modelos\ControlCalidad\FT_SOPORTE;
use App\Modelos\ControlCalidad\FT_FIBRA_ALAMBRE;
use App\Modelos\ControlCalidad\FT_DIMENSION_CEPILLO;
use App\Modelos\ControlCalidad\FT_BOLILLO;
use App\Modelos\ControlCalidad\FT_CORRUGADO;
use App\Modelos\ControlCalidad\FT_GANCHO;
use App\Modelos\ControlCalidad\FT_RESORTE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FichaTecnicaController extends Controller
{
    public function index(){

    	
        $ficha=DB::Connection()->select("SELECT FI.id,FI.REVISION,FI.ARTICULO,AR.DESCRIPCION,FI.FAMILIA ,FI.CLIENTE,FI.PAIS
        FROM
        IBERPLAS.FT_FICHA FI,
        IBERPLAS.ARTICULO AR
        WHERE 
        FI.ARTICULO=AR.ARTICULO");

       

    	return view('ControlCalidad.index', ['ficha' => $ficha]);

    }

    public function FichaTecnica(Request $request,$id){

      $ft_ficha=FT_FICHA::where('id','=',$id)->first();
      $ft_insertado=FT_INSERTADO::where('ficha_id','=',$id)->first();
      $ft_soporte=FT_SOPORTE::where('ficha_id','=',$id)->first();
      $ft_fibra_alambre=FT_FIBRA_ALAMBRE::where('ficha_id','=',$id)->first();
      $ft_dimension_cepillo=FT_DIMENSION_CEPILLO:: where('ficha_id','=',$id)->first();
      $ft_bolillo=FT_BOLILLO::where('ficha_id','=',$id)->first();
      $ft_corrugado=FT_CORRUGADO::where('ficha_id','=',$id)->first();
      $ft_gancho=FT_GANCHO::where('ficha_id','=',$id)->first();
      $ft_resorte=FT_RESORTE::where('ficha_id','=',$id)->first();

      
      
      
        return view('ControlCalidad.Ficha_Tecnica')
        ->with('ft_ficha',$ft_ficha)
        ->with('ft_insertado',$ft_insertado)
        ->with('ft_soporte',$ft_soporte)
        ->with('ft_fibra_alambre',$ft_fibra_alambre)
        ->with('ft_dimension_cepillo',$ft_dimension_cepillo)
        ->with('ft_bolillo',$ft_bolillo)
        ->with('ft_corrugado',$ft_corrugado)
        ->with('ft_gancho',$ft_gancho)
        ->with('ft_resorte',$ft_resorte);
    }
}
