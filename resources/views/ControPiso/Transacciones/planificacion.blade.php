@extends('layouts.app')

@section('htmlheader_title')
    Planificacion
@endsection


@section('main-content')




<div class="container">
  <div class="row">
    <div  class="col-md-10">
       <form   id="form_planificacion" role="search" action="{{route('guardar_planificacion')}}" method="GET" >
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box box-default">
              <div class="box-header with-border">
                <h1  align="center" >Produccion</h1>
             

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">

                   
                      <div class="form-group">
                        <label>Numero de Orden de Produccion</label>
                        <input id="norden" name="norden" type="text" class="form-control" value="{{ $ordenproduccion->ORDEN_PRODUCCION}}" readonly="readonly" >
                      </div>

                      <div class="form-group">
                        <label>Cantidad a Producir </label>
                        <input type="text" id="cantidadaproducir" name="cantidadaproducir" class="form-control" value=" {{ ($ordenproduccion->CANTIDAD_ARTICULO-$ordenproduccion->CANTIDAD_PRODUCCI)}}"  onkeypress="return valida(event)" >
                      </div>

                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Articulo a Producir </label>
                        <input type="hidden" name="articulo" id="articulo"  value={{$ordenproduccion->ARTICULO}}>
                        <input type="text" class="form-control" value=" {{$ordenproduccion->ARTICULO}} - {{$ordenproduccion->REFERENCIA}} " disabled>
                      </div>



                    <div class="form-group">
                        <label>Fecha Planificada en Produccion </label>
                        <input type="text" class="form-control" value="{{Carbon\Carbon::parse($ordenproduccion->FECHA_REQUERIDA)->format('d-m-Y H:i:s')}}" disabled>
                      </div>                

                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
          </div>


          <div class="box box-default">
                <div class="box-header with-border">
                  <h1  align="center" >Pedido</h1>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">  
                        <div class="form-group">

                           <label>Selecione el Pedido </label>

                          <select id="id_pedido" name="id_pedido" class="form-control select2" style="width: 100%;">
                                   <option value="0">SELECIONES UN PEDIDO:</option>
                                    <option value="000000">PRODUCCION INTERNA</option>
                                   @foreach($pedido as $pedido)
                                   <option value="{{ $pedido->PEDIDO }}">{{ $pedido->PEDIDO }}--{{ $pedido->NOMBRE_CLIENTE }} </option>
                                   @endforeach
                          </select>


                         </div>

                        </div>

                        <div class="form-group">
                          <label >Direccion Cliente </label>
                          <input type="text" class="form-control" id="nombrecliente" disabled  >
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                          <label  >Pais </label>
                          <input  type="text" class="form-control"   id="Pais" disabled>
                        </div>
                      <div class="form-group">
                          <label >Fecha Ofrecida por Ventas </label>
                          <input  type="text" class="form-control" id="fecharequerida" disabled>
                      </div>                

                 


                  

                      
                    </div>
                  </div>
                </div>
          </div>

          <div class="box box-default">
                <div class="box-header with-border">
                  <h1  align="center" >Centro Costo</h1>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
              
                   <div class="row">
                    <div class="col-md-6">
                     
                      <div class="form-group">
                           <label>Selecione el Centro Costo </label>

                          <select id="id_centrocosto" name="id_centrocosto" class="form-control select2" style="width: 100%;">
                                    <option value="0">SELECIONES UN CENTRO COSTO:</option>
                                   @foreach($centrocosto as $centrocosto)
                                   <option value="{{ $centrocosto->EQUIPO }}">{{ $centrocosto->EQUIPO }}--{{ $centrocosto->DESC_EQUIPO }} </option>
                                   @endforeach
                          </select>

                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label > Cantidad de Piezas Por Hora </label>
                          <input  type="text" class="form-control" id="piezaxhora" name="piezaxhora" onkeypress="return valida(event)" >
                      </div>

                        <input type="hidden" name="color" id="color" />
                       


                     
                         <div class="form-group">
                          <label > Fecha Planificada </label>
                          <input  type="date" class="form-control" id="id_fecha"  name="id_fecha" style="width: 300px;height: 40px"   value="<?php echo date("Y-m-d");?>">      
                         </div>

                          <div class="form-group">
                          <fieldset data-role="controlgroup" data-type="horizontal" >
                            <legend>Horario Normal </legend>
                            <label for="normal">Normal</label>
                            <input type="checkbox" name="normal" id="normal" value="normal" checked onclick="ValidarCkecked()" >

                          </fieldset>

                         </div>
    



                         <div class="form-group">
                          <fieldset data-role="controlgroup" data-type="horizontal" >
                            <legend>Dias de Trabajo </legend>
                            <label for="lunes">Lunes</label>
                            <input type="checkbox" name="lunes" id="lunes" value=1  class="checar"  >
                            <label for="martes">Martes</label>
                            <input type="checkbox" name="martes" id="martes" value="2" class="checar"    >
                            <label for="miercoles">Miercoles</label>
                            <input type="checkbox" name="miercoles" id="miercoles" value="3" class="checar"  >
                            <label for="red">Jueves</label>
                            <input type="checkbox" name="jueves" id="jueves" value="4" class="checar"  >
                            <label for="red">Viernes</label>
                            <input type="checkbox" name="viernes" id="viernes" value="5"  class="checar"  >
                            <label for="red">Sabado</label>
                            <input type="checkbox" name="sabado" id="sabado" value="6"  class="checar" >
                            <label for="red">Domingo</label>
                            <input type="checkbox" name="domingo" id="domingo" value="7" class="checar"  >

                          </fieldset>

                         </div>


                        
                        
                     
                         </div>

                    

                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                          <label > Cantidad de Piezas Por Turno </label>
                          <input  type="text" class="form-control" id="piezaxturno" name="piezaxturno" readonly="readonly">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label > Cantidad de Turnos </label>
                          <input  type="text" class="form-control" id="cantidadturnos"  name="cantidadturnos"
                            readonly="readonly">
                      </div>

                      <div class="form-group">
                          <label > Tipo de Turno </label>
                          <select id="id_turno" name="id_turno" class="form-control select2" style="width: 100%;">
                            <option value="1">Mañana (06:00 - 14:00) </option>
                            <option value="2">Tarde  (14:00 - 21:00) </option>
                            <option value="3">Noche  (21:00 - 06:00)</option>
                          </select>  
                      </div>

                      <br>

                            <div class="form-group ">
              
                                    
                                    
                                    <input type="button" onmouseover="this.backgroundColor='blue' "  style="width: 450px;height: 40px" name="planificar" id="planificar"  value="Planificar Produccion" >
                            </div> 


                            <div class="form-group ">
              
                                    
                                
                                   
                            </div> 
                      </div>

            
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->   



                
                    
                </div>
                 

                             <!-- /.row -->
                



                <!-- /.box-body -->
          </div>

          <div class="box box-default">
                <div class="box-header with-border">
                  <h1  align="center" >Detalle Planificacion</h1>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   
                  </div>
                  
                  <div class="form-group">
                     <table class="table" border="1" id="tabla" ></table>
                  </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                
                
                <!-- /.box-body -->
                
                  


                   
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                             <div class="form-group" align="center">
                              <br>
                                    <button  align="center"  type="submit" onmouseover="this.backgroundColor='blue' "  style="width: 450px;height: 40px ;visibility:hidden " name="guardar" id="guardar"  value="Guardar"> Guardar </button>
                            </div> 
         </div> 
      </form>
    </div>
  </div>
    
</div>  






@endsection



@section('script2')

 <script >

  //Consulta de Pedidos
$(document).ready(function()
{


  $('#id_pedido').on('change',function () {

  var id =$('#id_pedido').val();
  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/ConsultaPedidos/"+id+"";
  $.ajax({
    url:miurl
  }).done(function(data){
     
     var content=JSON.parse(data);
     //console.log(content);

    //alert(content[0].PAIS);
    
    $("#nombrecliente").val(content[0].DESC_DIREC_EMBARQUE);
    $("#Pais").val(content[0].PAIS);
    $("#fecharequerida").val(content[0].FECHA_PROMETIDA);
   
  }) 


});

//Consulta de Centro de Costo
$('#id_centrocosto').on('change',function () 
{

  var id =$('#id_centrocosto').val();
  var id2=$('#articulo').val();
  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/ConsultaMaquina/"+id+"/"+id2+"";
  var nf=new Intl.NumberFormat(); 
  $.ajax({
    url:miurl
  }).done(function(data)
  {   
     
     var content=JSON.parse(data);  

     
    $("#piezaxhora").val( content[0].PIEZASXHORAS);
    $("#color").val( content[0].COLOR);
    $("#piezaxturno").val((content[0].PIEZASXHORAS)*8);
    var vcantidadaproducir=document.getElementById('cantidadaproducir').value;
    var vcantixturno=content[0].PIEZASXHORAS;    //$('#piezaxhora').val();
    r=vcantixturno*8;// piezas por turno
     
    v01= parseFloat(vcantidadaproducir).toFixed(2) ;
    v04=parseFloat(vcantixturno).toFixed(2) ;
    v02=parseFloat(r);
  
    v03=Math.round(v01/v02);
   
    //r2 = vcantidadaproducir/r; //turnos necesarios
    document.getElementById("piezaxhora").value=v04;
    document.getElementById("piezaxturno").value=r;
   document.getElementById("cantidadturnos").value=v03;
    //document.getElementById("color").value='xx';
  
    
  })

    
   
 });









$('#piezaxhora').keyup(function(){
    
    var vcantixturno=document.getElementById('piezaxhora').value;    //$('#piezaxhora').val();
    var vcantidadaproducir=document.getElementById('cantidadaproducir').value;  //$('#cantidadaproducir').val();
    r=vcantixturno*8;// piezas por turno

    v01= parseFloat(vcantidadaproducir).toFixed(2) ;
    v02=parseFloat(r);
    v03=Math.round(v01/v02);

    //r2 = vcantidadaproducir/r; //turnos necesarios
    
    document.getElementById("piezaxturno").value=r;
   document.getElementById("cantidadturnos").value=v03;
    
  })

});


$('#cantidadaproducir').keyup(function(){

    var vcantixturno=document.getElementById('piezaxhora').value;    //$('#piezaxhora').val();
    var vcantidadaproducir=document.getElementById('cantidadaproducir').value;  //$('#cantidadaproducir').val();
    r=vcantixturno*8;// piezas por turno

    v01= parseFloat(vcantidadaproducir).toFixed(2) ;
    v02=parseFloat(r);
    v04=v01/v02;

    v03=Math.round(v04);



    //r2 = vcantidadaproducir/r; //turnos necesarios

    document.getElementById("piezaxturno").value=r;
    document.getElementById("cantidadturnos").value=v03;

});

// Boton de Planificacion
$('#planificar').click(function(){
  
eliminarFilas();
ValdiarCampos();

  
  var dataString=$('#form_planificacion').serialize();



  
  var vcantidadaproducir=document.getElementById('cantidadaproducir').value;  
  id2= parseFloat(vcantidadaproducir).toFixed(2) ;
  
  var id=document.getElementById('cantidadturnos').value;
  var id3=document.getElementById('piezaxturno').value;
  var id4=document.getElementById('id_fecha').value;
  var id5=document.getElementById('id_turno').value;
  var id6=document.getElementById('id_centrocosto').value;

  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/planificar/"+id+"/"+id4+"/"+id5+"/"+id6+"";
  
  var d='<tr>'+
   '<th>No</th>'+
   '<th>CORE</th>'+
   '<th>TURNO</th>'+
   '<th>FECHA_HORA_INICIO</th>'+
   '<th>FECHA_HORA_FIN</th>'+
   '<th>CANTIDAD A PRODUCIR</th>'+
   '</tr>';
 
  $.ajax({
    url:miurl,
    data:dataString,
  }).done(function(data){
     
     var valor=data 
    if(valor==1){

      alert("No Existe Disponibilidad para esta Fecha");

    }else
    { 
         $no=0 
         $acumulado=0
          v01= parseFloat(vcantidadaproducir).toFixed(2) ;
          $variable= id3;
          $variable=$variable.replace(/,/g,""); 
          $variable=parseFloat($variable);


          var nf=new Intl.NumberFormat();
          var df=new Intl.DateTimeFormat("en-US");
         var content=JSON.parse(data);
         for(var i=0;i<content.length;i++)
          {
          $no=$no+1

          $acumulado=$variable+$acumulado  ;
          

           if($no==id){
             $x=vcantidadaproducir-$acumulado;
             
             id3=$variable+$x
             
             id3=nf.format(id3);
              
             
           }else{
              id3=nf.format($variable);
           }

           var fi=content[i].HORA_INICIO;
                    
          
          d+='<tr>'+
          '<td>'+$no+'</td>'+
          '<td>'+content[i].CORE+'</td>'+
          '<td>'+content[i].TURNO+'</td>'+
          '<td>'+fi+'</td>'+
          '<td>'+content[i].HORA_FIN+'</td>'+
          '<td>'+id3+'</td>'+
          '</tr>';
         }
         $("#tabla").append(d);

          document.getElementById('guardar').style.visibility='visible';
   
   } 
  })
  
  


});


function eliminarFilas(){

 var Parent =document.getElementById("tabla");
 while(Parent.hasChildNodes())
 {
     Parent.removeChild(Parent.firstChild);
 }
};

function ValdiarCampos()
{
  var pedido=$('#id_pedido').val();
 if(pedido=="0" ){
  alert(' Tiene que Selecionar un  pedido');
  return false;
 }
 
}


function ValidarCkecked(){

 

  if($(this.normal).prop('checked')){

   
    $('.checar').prop('checked',false);
  }else{
    $('.checar').prop('checked',true);
  }
}




 
</script>


@endsection
 

 

