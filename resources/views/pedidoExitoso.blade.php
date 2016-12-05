@extends('layouts.principal')

@section ('contenido')

<div class="container">
	<h1>Su pedido se ha realizado con exito</h1>
	<a href="{{url('/generarComprobante')}}/{{$pedido->id}}" class="btn btn-primary" target="_blank">Generar Pedido</a>

</div>


@stop