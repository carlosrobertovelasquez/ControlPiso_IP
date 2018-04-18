@extends('layouts.app')

@section('htmlheader_title')
    Fichas Tecnica
@endsection
@section('contentheader_title')
   Ficha Tecnica
@endsection


@section('main-content')

  <div class="row">
         <div class="col-xs-12">
         
         <div class="box">
            
            
            
            <a href="#" class="add-modal"><span class="btn btn-primary" aria-hidden="true">ADICIONAR FICHA</span></a>            
            <!-- /.box-header -->
            <div class="box-body">
                      <div class="form-group">
             
                </div>
              <table id="example1" class="display nowrap"  style="width:95%" >
                <thead>
                <tr>
                  <th>Id</th>
                  <th>ARTICULO</th>
                  <th>DESCRIPCION</th>
                  <th>FAMILIA</th>
                  <th>SELECIONAR</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                        $modal=0;
                        ?>
                 {{csrf_field()}}       
                 
				 		

                       @foreach($ficha as $ficha)
               <tr>
                            <td>{{$ficha->id}}</td>
                            <td>{{$ficha->ARTICULO}}</td>
                            <td>{{$ficha->DESCRIPCION}}</td> 
                            <td>{{$ficha->FAMILIA}}</td> 
                            <td>
                               <button class="show-modal btn btn-success" 
                               data-id="{{$ficha->id}}" 
                               data-title="{{$ficha->ARTICULO}}"
                               data-des="{{$ficha->DESCRIPCION}}"
                               <span class="glyphicon glyphicon-eye-open"></span>Show</button>
                                

                             </td>                

               </tr>

                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>ARTICULO</th>
                  <th>DESCRIPCION</th>
                  <th>FAMILIA</th>
                  <th>SELECIONAR</th>
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
  
<div class="modal fade" id="showModal" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>CLAVES</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
				    <div class="row">
				    	<div class="col-md-6">
	                        <div class="form-group">
						 		<label>ID </label>
						 		<input id="id_show" type="text" class="form-control"  	readonly="readonly" >
	                        </div>
				            <div class="form-group">
			                    <label>DESCRIPCION </label>
			                    <input type="text" id="des_show" name="cantidadaproducir" class="form-control"  readonly="readonly">
	                        </div>

							<div class="form-group">
			                    <label>EQUIPO </label>
			                    <input type="text" id="cantidadaproducir" name="cantidadaproducir" class="form-control"  readonly="readonly">
			                    
	                        </div>

	                        <div class="form-group">
			                    <label>OPERACION  </label>
			                    <input type="text" id="operacion" name="operacion" class="form-control" readonly="readonly" >
	                        </div>
	                        
	                       
                         
	                    </div>

	                    <div class="col-md-6">
	                        <div class="form-group">
						 		<label>CLAVE </label>
						 		<input id="title_show" name="norden" type="text" class="form-control"  	readonly="readonly" >
	                        </div>
				            <div class="form-group">
			                    <label >ESTADO </label>
			                    <input type="text" id="estado_show" name="id_opera" class="form-control"   readonly="readonly">
	                        </div>

							<div class="form-group">
			                    <label>HORAS POR CICLO</label>
			                    <input type="text" id="cantidadaproducir" name="cantidadaproducir" class="form-control" readonly="readonly" >
	                        </div>

	                        
	                       
	                       
	                    </div>    
                    </div>
                </div>   
			</div>
			
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Planificar">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addModal" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4> AGREGAR CLAVES</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
				    <div class="row">
				    	<div class="col-md-6">
	                        <div class="form-group">
						 		<label>CLAVE </label>
						 		<input id="id_show" type="text" class="form-control"  	>
	                        </div>
				            <div class="form-group">
			                    <label>OPERACION </label>
			                    <select>
                            <option value="SUMA">SUMA</option>
                            <option value="RESTA">RESTA</option>
                          </select>
	                        </div>

						

	                       
	                        
	                       
                         
	                    </div>

	                    <div class="col-md-6">
	                       
				            <div class="form-group">
			                    <label >DESCIPCION </label>
			                    <input type="text" id="estado_show" name="id_opera" class="form-control"   >
	                        </div>

						

	                        
	                       
	                       
	                    </div>    
                    </div>
                </div>   
			</div>
			
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="GUARDAR">
			</div>
		</div>
	</div>
</div>


@endsection

@section('script2')
<script>

 
 $(document).on('click','.show-modal',function(){
  $('.modal-title').text('Show');
  $('#id_show').val($(this).data('id'));
  $('#title_show').val($(this).data('title'));
  $('#des_show').val($(this).data('des'));
  $('#estado_show').val($(this).data('estado'));
$('#showModal').modal('show');
 });
 
 $(document).on('click','.add-modal',function(){
    
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
 });


</script>

@endsection