@extends('layouts.app')

@section('htmlheader_title')
    Produccion
@endsection

@section('contentheader_title')
 Ordenes de Produccion 
@endsection

@section('main-content')


  <div class="row">
      <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
            
          
            <!-- /.box-header -->
                <div class="table-responsive" >
                  <table id="example1" class="display nowrap"    >
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Ord.Prod</th>
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>Pedido</th>
                          <th>Maquina</th>
                          <th>Estado</th>
                          <th>Fecha</th>
                          <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      @foreach($OrdenProduccion as $OrdenProduccion)
                        <tr>
                                <td >{{ $OrdenProduccion->ID}}</td>
                                <td >{{ $OrdenProduccion->ORDENPRODUCCION }}</td> 
                                <td>{{ $OrdenProduccion->ARTICULO }}</td> 
                                <td>{{ number_format($OrdenProduccion->CANTIDADAPRODUCIR ,2)}}</td>
                                <td>{{$OrdenProduccion->PEDIDO}}</td>
                                <td>{{$OrdenProduccion->MAQUINA}}</td>
                                <td>{{$OrdenProduccion->ESTADO}}</td>
                                <td>{{ Carbon\Carbon::parse($OrdenProduccion->FECHAPLANIFICADA)->format('d-m-Y') }}</td>
                               
                               
                                <td>
                                 <a href="{{route('registro.mo',[$OrdenProduccion->ID,$OrdenProduccion->ORDENPRODUCCION])}}" class="btn btn-primary">Mano Obra</a>
                                <a href="{{route('registro.ma',[$OrdenProduccion->ID,$OrdenProduccion->ORDENPRODUCCION])}}" class="btn btn-primary">Materiales</a>
                                <a href="{{route('registro.impresion',[$OrdenProduccion->ID,$OrdenProduccion->ORDENPRODUCCION])}}" class="btn btn-primary">Imprimir</a>             
                                </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Ord.Produ</th>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Pedido</th>
                        <th>Maquina</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Selecionar</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
         </div>
      </div>
  </div>       
  







@endsection