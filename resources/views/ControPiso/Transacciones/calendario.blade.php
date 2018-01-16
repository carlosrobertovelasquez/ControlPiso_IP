@extends('layouts.app')

@section('htmlheader_title')
    Calendario
@endsection


@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection



@section('main-content')

 <div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <div class="panel panel-default">
               <form class="navbar-form" role="search" action="{{route('cargaEventos.index')}}" > 

                <div class="panel-heading">Calendario de Cento de Costo : 
                <select id="id_centrocosto" name="id_centrocosto" class="form-control select2" style="width: 100%;">
                                    <option value="0">TODOS LOS CENTROS DE COSTO</option>
                                   @foreach($centrocosto as $centrocosto)
                                   <option value="{{ $centrocosto->EQUIPO }}">{{ $centrocosto->EQUIPO }}--{{ $centrocosto->DESC_EQUIPO }} </option>
                                   @endforeach
                          </select>
                    
                                <input  name="search" id="search" value="Buscar" class="btn btn-info active" type="submit" />
                    

                </div>

               </form> 

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script2')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection







