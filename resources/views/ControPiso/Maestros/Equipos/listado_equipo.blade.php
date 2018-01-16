@extends('layouts.app')

@section('htmlheader_title')
    Equipos
@endsection
@section('contentheader_title')
 Centro de Costo 
@endsection


@section('main-content')

  <div class="row">
         <div class="col-xs-12">
         
         <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
                      <div class="form-group">
             
                </div>
              <table id="example1" class="display nowrap"  style="width:95%" >
                <thead>
                <tr>
                  <th>Equipo</th>
                  <th>Descripcion</th>
                  <th>Selecionar</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                        $modal=0;
                        ?>
                 {{csrf_field()}}       
                 @foreach($Equipo as $Equipo)
				 		<tr>
                            <td>{{ $Equipo->EQUIPO }}</td> 
                            <td>{{ $Equipo->DESCRIPCION }}</td> 
                            <td>
                                <a href="{{route('listar_equipo_articulo',$Equipo->EQUIPO)}}" class="btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                
                                
                                <a href="{{route('agregar_articulo',$Equipo->EQUIPO)}}"
                                           class="btn btn-success">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                 </a>
                                       

                             </td>                






				 		
				 		@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Equipo</th>
                  <th>Descripcion</th>
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