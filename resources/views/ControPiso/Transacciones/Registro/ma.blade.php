@extends('layouts.app')

@section('htmlheader_title')
    Materiales
@endsection
@section('contentheader_title')
 Materiales 
@endsection

@section('main-content')

<section class="content">
<form  id="form_consumo" role="search" action="#" method="GET" >
          <input type="hidden" name="_token" value="{{csrf_token()}}">

  <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Materiales</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
      </div>
      <div class="box-body">
          <div class="table-responsive" >
                  <table id="example1" class="display nowrap"  style="font-size:80%"   >
                    <thead>
                        <tr>
                          <th>ORDEN PRODUCCION</th>
                          <th>ARTICULO</th>
                          <th>DESCRIPCION</th>
                          <th>CANTIDAD</th>
                          <th>UNIDAD</th>
                          <th>OPERACION</th>
                          <th>CANTIDAD</th>
                          <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      @foreach($consumo as $consumo)
                        <tr>
                                <td >{{ $consumo->ORDEN_PRODUCCION}}</td>
                                <td >{{ $consumo->ARTICULO}}</td>
                                <td >{{ $consumo->DESCRIPCION }}</td> 
                                <td>{{ number_format($consumo->CANTIDAD_ESTANDAR ,2)}}</td>
                                <td>{{$consumo->UNIDAD_ALMACEN}}</td>
                                <td>{{$consumo->OPERACION}}</td>
                                <td> <input type="number"></td>
                                <td>
                                  <select name='tipotrans'>
                                    <option value="01">Consumo</option>;
                                    <option value="01">Devolucion</option>;
                                    <option value="01">Otros</option>;
                                   </select>
                                </td>
                              
                                <td>
                                <a href="{{route('registro.agregarconsumo',[$consumo->ORDEN_PRODUCCION,$consumo->ARTICULO])}}" class="btn btn-primary">Registar</a>

                                 
                                 
                               </td>
                        </tr>
                      @endforeach
                    </tbody>         
                  </table>
                </div>
      


      </div>
  </div>
  <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Registro de Materiales</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
      </div>
     
           <div id="lista_materiales"></div>
           
     
  </div>
    
  </div>
  </form>
 </section> 
  


@section('script2')
<script>
function crearconsumo(){
    var dataString=$('#form_registrohoras').serialize();
    var urlraiz=$("#url_raiz_proyecto").val();
     var miurl =urlraiz+"/registro/agregarconsumo/";
    
    
  $.ajax({
     url:miurl,
    data:dataString,
  }).done(function(data){
    listarconsumo();  


  });

  }

  function listarconsumo(){
var id= document.getElementById("norden").value;
var id2= document.getElementById("id_turno").value;
var id3= document.getElementById("id_operacion").value; 
var urlraiz=$("#url_raiz_proyecto").val();
var miurl =urlraiz+"/registro/listarcomsuno";

$.ajax({
  type:'get',
  url:miurl,
  data:{id:id,id2:id2,id3:id3},
  success:function(data){
    $('#lista_empleados').empty().html(data);
  }
 });

}

</script>
@endsection




@endsection