<?php

namespace App\Http\Controllers;
use  App\Modelos\Softland\turno;

use Illuminate\Http\Request;

class TurnosController extends Controller
{
    public function index(){

    	$turnos=turno::all();

    	return view('ControPiso.Maestros.turnos.index', ['turnos' => $turnos]);

    }

}
