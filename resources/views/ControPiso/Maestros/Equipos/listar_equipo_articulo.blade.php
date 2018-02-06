@extends('layouts.app')

@section('htmlheader_title')
    Equipos
@endsection


@section('main-content')


  <div class="row">
         <div class="col-xs-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Equipos Articulos</h3>
            </div>

               <a href=" {{url('Equipo')}}" ><span class="btn btn-primary" aria-hidden="true">Regresar</span></a>
            <!-- /.box-header -->
              @include('flash::message')
            <div class="box-body">
                      <div class="form-group">
             
                </div>
              <table id="example1" class="display nowrap"  style="width:95%" >
                <thead>
                <tr>
                  <th>Equipo</th>
                  <th>Descripcion</th>
                  <th>Articulo</th>
                  <th>Piezas Por Hora</th>
                  <th>NUM_CAVI</th>
                  <th>OPERA</th>
                  <th>TIE MOLDE</th>
                  <th>Selecionar</th>
                </tr>
                </thead>
                <tbody>
                   
                 {{csrf_field()}}       
                 @foreach($equipoarticulo as $equipoarticulo)
				 		<tr>
                            <td>{{ $equipoarticulo->EQUIPO }}</td> 
                            <td>{{ $equipoarticulo->DESC_EQUIPO }}</td>
                            <td>{{ $equipoarticulo->ARTICULO }}</td>
                            <td>{{ $equipoarticulo->PIEZASXHORAS }}</td>
                            <td>{{ $equipoarticulo->NUM_CAVIDADES }}</td> 
                            <td>{{ $equipoarticulo->OPERACION }}</td>
                            <td>{{ $equipoarticulo->TIEMPOMOLDE }}</td>
                            <td>
                             
                                
                                <a href="{{route('listar_equipo_articulo2',$equipoarticulo->ID)}}"
                                           class="btn btn-success" " >
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                 </a>
                                       

                             </td>                
          
                  </tr>
				 		@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Equipo</th>
                  <th>Descripcion</th>
                  <th>Articulo</th>
                  <th>Piezas Por Hora</th>
                  <th>NUM_CAVI</th>
                  <th>OPERA</th>
                  <th>TIE MOLDE</th>
                  <th>Selecionar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  

@endsection