<?php

namespace App\Http\Controllers;
use Dhtmlx\Connector\SchedulerConnector; 

use Illuminate\Http\Request;
use App\Modelos\ControlPiso\CP_tasks;

class GanttController extends Controller
{

         public function index(){

           return view("ControPiso.Consulta.gantt");
          }

     public function get(){

      $tasks = new CP_tasks();
      $tasks = CP_tasks::orderBy('id', 'desc')->get();

         return response()->json([
            "data" => $tasks
        ]);	
     }
    


}
