@extends('layouts.app')

@section('htmlheader_title')
    Fichas Tecnica
@endsection
@section('contentheader_title')
   Ficha Tecnica
@endsection


@section('main-content')

<section class="content">
  <form  id="form_registrohoras" role="search" action="#" method="GET" >
          <input type="hidden" name="_token" value="{{csrf_token()}}">
  	<div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h2 class="box-title">ESPECIFICACION DE PRODUCTOS</h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
  	 	</div>

  	 	<div class="box-body">
  	 		<div class="col-md-6">
  	 		 	<div class="form-group">
                    <div class="form-group">
                          <label > FECHA : </label>
                          <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"    value="{{$ft_ficha->FECHA}}" readonly="readonly" >      
                    </div>
                </div>
            </div>
             <div class="col-md-6">
             	<div class="form-group">
                        <label>REVISION : </label>
                        <input id="id_articulo" name="id_articulo" type="text" class="form-control" value="{{$ft_ficha->REVISION}}" readonly="readonly" >
                </div>               
             </div>
  	 	</div>

  	 </div>

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title"  >INFORMACION DE PRODUCTO</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
  	 	</div>

        <div class="box-body">
        <div class="col-md-6">
  	 		 	<div class="form-group">
                    <div class="form-group">
                          <label > PRODUCTO : </label>
                          <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_ficha->DESCRIPCION_ART}}" readonly="readonly">      
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                          <label > CODIGO BARRA : </label>
                          <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_ficha->CODIGO_BARRA}}" readonly="readonly">      
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                          <label > CODIGO DUN : </label>
                          <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_ficha->CODIGO_DUN}}" readonly="readonly">      
                    </div>
                </div>


        </div>
             <div class="col-md-6">
             	<div class="form-group">
                        <label>CODIGO PRODUCTO : </label>
                        <input id="id_articulo" name="id_articulo" type="text" class="form-control" value="{{$ft_ficha->ARTICULO}}" readonly="readonly" >
                </div>
                <div class="form-group">
                        <label>CLIENTE : </label>
                        <input id="id_articulo" name="id_articulo" type="text" class="form-control" value="{{$ft_ficha->CLIENTE}}" readonly="readonly" >
                </div>
                <div class="form-group">
                        <label>PAIS : </label>
                        <input id="id_articulo" name="id_articulo" type="text" class="form-control" value="{{$ft_ficha->PAIS}}" readonly="readonly" >
                </div>               
             </div>     
 

        </div>
    </div>
    

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">INFORMACION INSERTADO</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > No DE AGUJEROS : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->NUM_AGUJEROS}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > No DE BROCA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->NUM_BROCA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > No FILAS : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->NUM_FILAS}}" readonly="readonly">      
                        </div>
                    </div>


            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > PROFUND DE AGUJERO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->PROFU_AGUJERO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PROFUND. DE LEGUETA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->PROFU_LENGUETA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > M.O.D : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_insertado->MO_UTILIZADA}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
        </div>
    </div>   
    
    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">SOPORTE</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > SOPORTE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->SOPORTE}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > SOPORTE SIN PERFORAR : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->PESO_SOPOR_SIN_PERFO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > SOPORTE PERFORADO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->PESO_SOPOR_CON_PERFO}}" readonly="readonly">      
                        </div>
                    </div>


            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLOR : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->COLOR}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->TOLERANCIA_1}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_soporte->TOLERANCIA_2}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
        </div>
    </div>   

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">FIBRA Y ALAMBRE</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label > MONOCOLOR : </label>
                            <input  type="text" class="form-control"   value="{{$ft_fibra_alambre->MONOCOLOR}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label >COMBINACION 1 : </label>
                            <input  type="text" class="form-control"   value="{{$ft_fibra_alambre->COMBINACION_1}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_2}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_3}}" readonly="readonly">      
                        </div>
                    </div>


            </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label > BICOLOR : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->BICOLOR}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COMBINACION 2: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_4}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_5}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_6}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label > TIPO DE FIBRA: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TIPO_FIBRA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COMBINACION 3 : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_7}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_8}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COMBINACION_9}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLOR DE FIBRA 1: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COLOR_FIBRA_1}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PESO DE FIBRA 1 : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->PESO_FIBRA_1}}" readonly="readonly">      
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="form-group">
                        <label > TOLERANCIA DE FIBRA 1 : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TOLERANCIA_1}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > DIAMETRO DE FIBRA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->DIAMETRO_FIBRA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label >LARGO DE FIBRA: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->LARGO_FIBRA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > DIAMETRO DE ALAMBRE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->DIAMETRO_ALAMBRE}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > PESO DE ALAMBRE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->PESO_ALAMBRE}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLOR DE FIBRA 2: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->COLOR_FIBRA_2}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PESO DE FIBRA 2 : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->PESO_FIBRA_2}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > TOLERANCIA DE FIBRA 2: </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TOLERANCIA_2}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TOLERANCIA_3}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TOLERANCIA_4}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_fibra_alambre->TOLERANCIA_ALAMBRE}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                       <br>
                        <label style="color:#FF0000" > NOTA: PESO Y COLOR DE FIBRA 2 APLICA CUANDO ES BICOLOR  </label>
                          
                        </div>
                    </div>
            </div>



        </div>
    </div>   

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">DIMENSIONES DE CEPILLO</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > LARGO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->LARGO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > ANCHO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->ANCHO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > ALTO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->ALTO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PLUMADO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->PLUMADO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PESO CEPILLO SIN PLUMAR : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->PESO_CEPILLO_SIN_PLUMA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > PESO CEPILLO PLUMADO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->PESO_CEPILLO}}" readonly="readonly">      
                        </div>
                    </div>

            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_1}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_2}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA :</label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_3}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA :</label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_4}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA :</label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_5}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > TOLERANCIA :</label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_dimension_cepillo->TOLERANCIA_6}}" readonly="readonly">      
                        </div>
                    </div>
            </div>
        </div>
    </div>   

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">BOLILLO</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-6">
                     <div class="form-group">
                        <div class="form-group">
                            <label > TIPO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->TIPO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > CAPUCHON COLGANTE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->CAPUCHON_COLGANTE}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > CAPUCHON ROSCA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->CAPUCHON_ROSCA}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLOR CAPUCHONES : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->COLOR}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLORES DE BOLILLO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->COLOR_PALO}}" readonly="readonly">      
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="form-group">
                            <label > VIÑETA DE BOLILLO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_bolillo->VINETA_PALO}}" readonly="readonly">      
                        </div>
                    </div>  

            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > CAPUCHON COLGANTE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > CAPUCHON ROSCA : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLOR CAPUCHONES : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > COLORES DE BOLILLO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > VIÑETA DE BOLILLO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="" readonly="readonly">      
                        </div>
                    </div>
            </div>
        </div>
    </div>   

    <div class="box box-default">
  	 	<div class="box-header with-border">
  	 		<h3 class="box-title">CORRUGADO</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > CORRUGADO : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_corrugado->CORRUGADO}}" readonly="readonly">      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label > ESTANDAR DE EMPAQUE : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_corrugado->ESTANDAR_EMPAQUE}}" readonly="readonly">      
                        </div>
                    </div>
                    


            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label > DESCRIPCION : </label>
                            <input  type="text" class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_corrugado->DESCRIPCION}}" readonly="readonly">      
                        </div>
                    </div>
                    
                    
            </div>

            <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label align="center"> OBSERVACIONES : </label>
                            <textarea rows="4"   class="form-control" id="id_fecha"  name="id_fecha"  value="{{$ft_corrugado->COMENTARIOS}}" readonly="readonly">{{$ft_corrugado->COMENTARIOS}} </textarea>      
                        </div>
                    </div>
                    
                    
            </div>

        </div>
    </div>   
    
  

    @if(is_null($ft_gancho))
            <p>.</p>
        @else
 
    @include('ControlCalidad.alambre')
    @endif
    
    
</div>     

   
   

 </form> 
</section>




@endsection





@section('script2')


<script>


 </script>
@endsection