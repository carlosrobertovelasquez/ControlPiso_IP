<div class="modal fade" id="showModal" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4> PLANIFICAR</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
				    <div class="row">
				    	<div class="col-md-6">
	                        <div class="form-group">
						 		<label>Order Produccion </label>
						 		<input id="idm_norden" name="idm_norden" type="text" class="form-control" value="{{ $ordenproduccion->ORDEN_PRODUCCION}}" 	readonly="readonly" >
	                        </div>
				            <div class="form-group">
			                    <label>Cantidad a Producir </label>
			                    <input type="text" id="id_cantidad"  class="form-control"  readonly="readonly">
	                        </div>

							<div class="form-group">
			                    <label>Centro Costo </label>
			                    <select id="id_centrocosto" class="form-control">
			                    	
			                    </select>
			                    
	                        </div>

	                        <div class="form-group">
			                    <label>Tiempo por Cambio Molde  </label>
			                    <input type="number" id="idm_tiempocm" name="idm_tiempocm" class="form-control" >
	                        </div>

	                         <div class="form-group">
                          <fieldset data-role="controlgroup" data-type="horizontal" >
                            <legend>Tomar Fecha Actual </legend>
                            <label for="normal">Tomar Fecha Actual</label>
                            <input type="checkbox" name="tomarfecha" id="tomarfecha" value="normal" checked  >

                          </fieldset>

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
                            <label for="lunes">L</label>
                            <input type="checkbox" name="lunes" id="lunes" value=1  class="checar"  >
                            <label for="martes">M</label>
                            <input type="checkbox" name="martes" id="martes" value="2" class="checar"    >
                            <label for="miercoles">K</label>
                            <input type="checkbox" name="miercoles" id="miercoles" value="3" class="checar"  >
                            <label for="red">J</label>
                            <input type="checkbox" name="jueves" id="jueves" value="4" class="checar"  >
                            <label for="red">V</label>
                            <input type="checkbox" name="viernes" id="viernes" value="5"  class="checar"  >
                            <label for="red">S</label>
                            <input type="checkbox" name="sabado" id="sabado" value="6"  class="checar" >
                            <label for="red">D</label>
                            <input type="checkbox" name="domingo" id="domingo" value="7" class="checar"  >

                          </fieldset>

                         </div>



	                    </div>

	                    <div class="col-md-6">
	                        <div class="form-group">
						 		<label>Articulo A Producir </label>
						 		<input id="id_articulo" name="id_articulo" type="text" class="form-control" value="{{ $ordenproduccion->ORDEN_PRODUCCION}}" 	readonly="readonly" >
	                        </div>
				            <div class="form-group">
			                    <label >Operacion </label>
			                    <input type="text" id="Mid_opera" name="Mid_opera" class="form-control"   readonly="readonly">
	                        </div>
                                 <input type="hidden"  id="id_secuencia" name="id_secuencia"  />      
							<div class="form-group">
			                    <label>Cantidad de unidades por Hora</label>
			                    <input type="Number" id="idm_cantidadxh" name="idm_cantidadxh" class="form-control" >
	                        </div>

	                        <div class="form-group">
			                    <label>Total Horas </label>
			                    <input type="text" id="idm_totalhoras" name="operacion" class="form-control" readonly="readonly" >
	                        </div>
	                        <div class="form-group">
			                    <label>Total de Turnos Estimados </label>
			                    <input type="text" id="idm_totalturnos" name="operacion" class="form-control" readonly="readonly" >
	                        </div>
	                        <div class="form-group">
		                          <label > Fecha : </label>
		                          <input  type="date" class="form-control" id="id_fecha"  name="id_fecha" style="width: 250px;height: 40px"   value="<?php echo date("Y-m-d");?>">      
                            </div>
                            <div class="form-group">
		                          <label > Hora : </label>
		                          <input  type="time" class="form-control" id="id_hora"  name="id_hora" style="width: 250px;height: 40px"   value="<?php echo date("H:i");?>">
		                                
                            </div>

                    </div>
                </div>   
			</div>
			
			<div class="modal-footer">
				<input type="button" onmouseover="this.backgroundColor='blue' "  style="width: 450px;height: 40px" name="planificar" id="planificar"  value="Planificar Produccion" >
			</div>
		</div>
	</div>
</div>
