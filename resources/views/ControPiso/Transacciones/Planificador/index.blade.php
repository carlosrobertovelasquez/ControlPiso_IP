@extends('layouts.app')

@section('main-content')

  
         <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PANTALLA DE CONTROL
                <small>ORDEN DE PRODUCCION</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">CUADRO DE CONTROL</li>
            </ol>
             <script type="text/javascript">
                         setTimeout("document.location=document.location",55000);
           </script>
        </section>

        <!-- Main content -->
        


        <section class="content">
            <!-- Small boxes (Stat box) -->

            <div class="row">
              <?php
                        $modal=0;
                        ?>
                @foreach($OrdenProduccion as $OrdenProduccion)
                <div class="col-lg-3 col-xs-6">
          
                
                      @if($OrdenProduccion->ESTADO=='P')
                       <div class="small-box bg-green">
                              
                             

        
                      @elseif($OrdenProduccion->ESTADO=='A')
                        <div class="small-box bg-yellow">
                             

                      @elseif($OrdenProduccion->ESTADO=='B')  
                         <div class="small-box bg-red">
                             
                      @endif

    
    <div class="modal fade" id="addComment{{ $modal}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
           <div class="modal-content" style="background-color:blue;">
            <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h2 class="modal-title" id="myModalLabel">
                            REGISTRO DE MANO DE OBRA 
                            ORDEN DE PRODUCCION:{{ $OrdenProduccion->ORDENPRODUCCION}}
                        </h2>
            </div>
            <div class="modal-body">
            <form method="post" action="#" style="font-size:14px">

             {{csrf_field()}}
                        <div class="form-group">
                        <div class="form-group row">                            
                             <label class="mr-sm-12"> Factura :</label>
                               <textarea name="id_factura" rows="1" class="form-control"></textarea>
                            
                            </div>
                        <input type="hidden" name="id_flete" value="{{ $OrdenProduccion->ORDENPRODUCCION}}" />     

                        
                        </div>
                        


                        <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
            <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>            

            </div>
           </div>

        </div>
    </div>                         

        



                     





                   
                        <div class="pull-right">
                            <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($OrdenProduccion->FECHACREACION)->diffForHumans()}}
                       </div>
                     
                        <div class="inner">
                            <h1>ID :{{  number_format($OrdenProduccion->ID)}}</h1>
                            <h4 class="center-block">ORDEN PRODUCCION</h4>
                            <p>{{$OrdenProduccion->ORDENPRODUCCION}}</p>
                            <h4 class="center-block">CENTRO COSTO</h4>
                            <p>{{$OrdenProduccion->MAQUINA}}</p>
                            <h4 class="center-block">Cantidad a Produccir</h4>
                            <p>{{ number_format($OrdenProduccion->CANTIDADAPRODUCIR)}}</p>
                            <h4 class="center-block">Articulo</h4>
                            <p>{{$OrdenProduccion->ARTICULO}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <div>
                           
                            <a href="#" class="btn btn-raised btn-primary">Consultar</a>
                          

                            @if($OrdenProduccion->ESTADO=='P')
                                     <a href="{{route('planificar.estadoP',$OrdenProduccion->ID)}}" class="btn btn-raised btn-warning">Planificado</a>
                                   
                            @elseif($OrdenProduccion->ESTADO=='A')
                                <a href="{{route('planificar.estadoA',$OrdenProduccion->ID)}}" class="btn btn-raised btn-danger">En Produccion</a>

                                

                            @elseif($OrdenProduccion->ESTADO=='B')
                                
                                  <a href="{{route('planificar.estadoB',$OrdenProduccion->ID)}}" class="btn btn-raised btn-info">Liquidado</a>

                            @endif
                           

                        </div>

                    </div>

                </div><!-- ./col -->
                  <?php $modal++?>
                @endforeach
            </div><!-- /.row -->
@endsection