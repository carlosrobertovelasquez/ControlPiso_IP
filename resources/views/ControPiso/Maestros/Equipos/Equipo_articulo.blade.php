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
          <h3 class="box-title">CENTRO COSTO: {{$Equipo->EQUIPO}}--{{$Equipo->DESCRIPCION}}</h3>

         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <form  role="search" action="" method="GET" >
                <label>CODIGO ARTICULO----DESCRIPCION</label>
                
                {!! Form::text('search_text',null,array('placeholder'=>'Buscar Articulo','class'=>'form-control','id'=>'search_text'))!!}


              </div>




               
                   <input type="hidden" name="id_equipo" value="{{$Equipo->EQUIPO}}" />
                   <input type="hidden" name="desc_equipo" value="{{$Equipo->DESCRIPCION}}" />
               <br>
               <label>Piezas x Horas</label>
              <div class="input-group">
                <input type="number" name="piezasxhora" class="form-control" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
               <label>Horas de Holguras por Dia</label>
              <div class="input-group">
                <input type="number" class="form-control" name=horasholgurapordia required="true">
                <span class="input-group-addon">.00</span>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>No. de Cavidades</label>
                <div class="input-group">
                <input type="number" class="form-control"  name="numcavidades" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Ciclo Segundos Maquinas</label>
                <div class="input-group">
                <input type="number" class="form-control"  name="ciclosegunMaquinas" required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <!-- /.form-group -->
              <br>
             <div class="form-group">
                <label>No. Operadores</label>
                <div class="input-group">
                <input type="number" class="form-control" name="numoperarios"  required="true">
                <span class="input-group-addon">.00</span>
              </div>
              <br>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
                
                 
                   <a href=" {{url('Equipo')}}" ><span class="btn btn-primary" aria-hidden="true">Regresar</span></a>
              </div>
            </form>        <!-- /.box-body -->

            
          </div>

          <!-- /.box -->

        </div>

        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
 

  


@endsection

@section('script2')





<script>
  

 

 $( function() {
    
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl =urlraiz+"/autocomplete-ajaxequipo/";
    
    $( "#search_text").autocomplete({
      source:miurl,
    });
  
  });



</script>
@endsection