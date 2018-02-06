@extends('layouts.app')

@section('htmlheader_title')
    Equipos
@endsection

@section('style')

<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

 

@endsection


@section('main-content')

  
 <div class="box box-default">
        <div class="box-header with-border">
        @foreach($equipoarticulo as $equipoarticulo)  
          <h3 class="box-title">CENTRO COSTO: {{$equipoarticulo->EQUIPO}}---{{$equipoarticulo->DESC_EQUIPO}} </h3>
            @include('flash::message')
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <form  role="search" action="{{url('editarArticuloCentrocosto',$equipoarticulo->ID)}}" method="GET" >
                <label>CODIGO ARTICULO----DESCRIPCION</label>
                <div class="input-group">  
                <input  id="search_text" name="search_text" value={{$equipoarticulo->ARTICULO}} type="text" class="form-control" readonly="readonly" >
                    
                </div>


              </div>




               
                   
               <br>
               <label>Piezas x Horas</label>
              <div class="input-group">
                <input  value={{$equipoarticulo->PIEZASXHORAS}} type="number" name="piezasxhora" class="form-control" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
               <label>Horas de Holguras por Dia</label>
              <div class="input-group">
                <input value={{$equipoarticulo->HORA_HOLGURASXDIA}}  type="number" class="form-control" name=horasholgurapordia required="true">
                <span class="input-group-addon">.00</span>
              </div>
              
                <label>Operacion</label>
            <div class="form-group">
               <select  name="operacion" id="operacion" class="form-control select2" style="width: 100%;">
                  <option value={{$equipoarticulo->OPERACION}}>{{$equipoarticulo->OPERACION}}</option>
                </select>
              </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>No. de Cavidades</label>
                <div class="input-group">
                <input type="number" value={{$equipoarticulo->NUM_CAVIDADES}} class="form-control"  name="numcavidades" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Ciclo Segundos Maquinas</label>
                <div class="input-group">
                <input value={{$equipoarticulo->CICLO_SEG_MAQUINA}} type="number" class="form-control"  name="ciclosegunMaquinas" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <!-- /.form-group -->
              <br>
             <div class="form-group">
                <label>No. Operadores</label>
                <div class="input-group">
                <input value={{$equipoarticulo->NUM_OPERADORES}} type="number" class="form-control" name="numoperarios"  required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
                <br>
              <div class="form-group">
                <label>Tiempo Cambiar Molde</label>
                <div class="input-group">
                <input value={{$equipoarticulo->TIEMPOMOLDE}} type="number" class="form-control" name="tiempoCambiarMolde"  required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <div class="form-group">
    
                <label>Selecionar Color</label>
                <div class="input-group">
                  <input name="color" type="color" value="#000000">
                </div>  
              

              </div>
                
                
                
              </div>
              <!-- /.box-body -->

            
          



            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        
      </div>
      <!-- /.box -->
 <div class="box-footer">
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                
                 
                   <a href=" {{url('Equipo')}}" ><span class="btn btn-primary" aria-hidden="true">Regresar</span></a>
              </div>
            </form>        <!-- /.box-body -->

            
          </div>

          @endforeach<!-- /.box -->

        </div>
 

        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
 

  


@endsection

@section('script2')





<script>
$(document).ready(function(){

  actualizaroperacion();
});

 $( function() {
    
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl =urlraiz+"/autocomplete-ajaxequipo/";
    
    $( "#search_text").autocomplete({
      source:miurl,
    });
  
  });
 $("#search_text").change(function(event){
   var id=document.getElementById("search_text").value
   var urlraiz=$("#url_raiz_proyecto").val();
   var miurl =urlraiz+"/opera_equipo/"+id+"";
   
    $.ajax({
      url:miurl,
      type:'get',
    }).done(function(data){
       $.each(data,function(key, registro) {
         $("#operacion").append('<option value='+registro.OPERACION+'>'+registro.DESCRIPCION+'</option>');
       });
       
    });

    



 });

function actualizaroperacion(){


   var id=document.getElementById("search_text").value
   var urlraiz=$("#url_raiz_proyecto").val();
   var miurl =urlraiz+"/opera_equipo/"+id+"";


    $.ajax({
      url:miurl,
      type:'get',
    }).done(function(data){
          document.getElementById("operacion").value="";
       $.each(data,function(key, registro) {
         $("#operacion").append('<option value='+registro.DESCRIPCION+'>'+registro.DESCRIPCION+'</option>');
       });
       
    });

    






}





</script>
@endsection