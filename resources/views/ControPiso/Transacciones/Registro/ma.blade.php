@extends('layouts.app')

@section('htmlheader_title')
    Materiales
@endsection
@section('contentheader_title')
 Materiales 
@endsection

@section('main-content')

<section class="content">

  <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Materiales</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
      </div>
      <div class="box-body">
          <div class="table-responsive" >
                  <table id="example1" class="display nowrap"  style="font-size:80%"   >
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
                      
                      @foreach($consumo as $consumo)
                        <tr>
                                <td >{{ $consumo->ORDEN_PRODUCCION}}</td>
                                <td >{{ $consumo->ARTICULO}}</td>
                                <td >{{ $consumo->DESCRIPCION }}</td> 
                                <td>{{ number_format($consumo->CANTIDAD_ESTANDAR ,2)}}</td>
                                <td>{{$consumo->UNIDAD_ALMACEN}}</td>
                                <td>{{$consumo->OPERACION}}</td>
                                <td> <input type="number"></td>
                                <td>
                                  <select name='tipotrans'>
                                    <option value="01">Consumo</option>;
                                    <option value="01">Devolucion</option>;
                                    <option value="01">Otros</option>;
                                   </select>
                                </td>
                              
                                <td>
                                 <a href="#" class="btn btn-primary">Registar</a>
                               </td>
                        </tr>
                      @endforeach
                    </tbody>         
                  </table>
                </div>
      


      </div>
  </div>
  <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Datos Generales</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
      </div>
      <div class="box-body">
           <div id="lista_materiales"></div>
      </div>
  </div>
    
  </div>
 
 </section> 
  


@section('script2')
<<script>

</script>
@endsection




@endsection