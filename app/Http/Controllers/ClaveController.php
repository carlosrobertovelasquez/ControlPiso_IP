<?php

namespace App\Http\Controllers;
use App\Modelos\ControlPiso\CP_CLAVE_MO;

use Illuminate\Http\Request;

class ClaveController extends Controller
{
      

         public function index()
    {
       
          $claves=CP_CLAVE_MO::all();





      return view('ControPiso.Maestros.Claves.index')
              ->with('claves',$claves);
           
    }






     
}
