<!doctype html>
<html lang="es">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
        <title>Orden de Produccion</title>
        
    </head>
    <body>
        <p> Se ha Registrado Nuevo Ticket : {{$CP_PLANIFICACION->id}}</p>
        <a href="{{url('ConsultarTicket/'.$CP_PLANIFICACION->id)}}">
        Clic para consultar Ticket</a>
        <ul>
        	<li>Orden Produccion:{{$CP_PLANIFICACION->ordenproduccion}}</li>
        	<li>Operacion :{{$CP_PLANIFICACION->operacion}}</li>
        	<li>Articulo:{{$CP_PLANIFICACION->articulo}}</li>
        	<li>Cantidad:{{$CP_PLANIFICACION->cantidad}}</li>
        	<li>Centro Costo:{{$CP_PLANIFICACION->centrocosto}}</li>
        	<li>Fecha Inicio:{{ $CP_PLANIFICACION->fechamin}}</li>
        	<li>Fecha Fin :{{$CP_PLANIFICACION->fechamax}}</li>
        	<li>Cantidad Horas:{{$CP_PLANIFICACION->horas}}</li>
        	<li>Usuario Creacion:{{$CP_PLANIFICACION->USUARIOCREACION}}</li>
        	<li>Fecha Hora Creacion:{{$CP_PLANIFICACION->FECHACREACION}}</li>

        </ul>
        <script src="js/main.js"></script>
    </body>
</html>