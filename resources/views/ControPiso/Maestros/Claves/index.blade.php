@extends('layouts.app')

@section('htmlheader_title')
    Claves
@endsection
@section('contentheader_title')
 Claves 
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
                  <th>Id</th>
                  <th>Claves</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Operacion</th>
                  <th>Selecionar</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                        $modal=0;
                        ?>
                 {{csrf_field()}}       
                 
				 		

                       @foreach($claves as $claves)
               <tr>
                            <td>{{$claves->ID}}</td>
                            <td>{{$claves->CLAVE}}</td>
                            <td>{{$claves->DESCRIPCION}}</td> 
                            <td>{{$claves->ACTIVA}}</td>
                            <td>{{$claves->OPERACION}}</td> 
                            <td>
                                <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                
                                
                                <a href="#"
                                           class="btn btn-success">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                 </a>
                                       

                             </td>                

               </tr>

                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Claves</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Operacion</th>
                  <th>Selecion</th>
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