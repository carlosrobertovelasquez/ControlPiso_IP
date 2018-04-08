<table class="table table-sm">
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
                      
                      @foreach($cp_consumo as $cp_consumo)
                        <tr id="fila">
                        
                                <td >{{ $cp_consumo->id}}</td>
                                
                              
                                <td>
                                 <a href="#" class="btn btn-primary">Registar</a>
                               </td>
                        </tr>
                  </tbody>
                </table>