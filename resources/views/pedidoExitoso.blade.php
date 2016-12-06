@extends('layouts.principal')

@section ('contenido')
<section id="do_action">
	<div class="container">		
		<div class="row text-center">
			<div class="heading">
				<img src="{{asset("imagenes/ok.png")}}">
				<h1>Su pedido se ha realizado con exito</h1>
				<a href="{{url('/generarComprobante')}}/{{$pedido->id}}" class="btn btn-primary" target="_blank">Generar Pedido</a>							
			</div>
		</div>		
	</div>
	
</section>



@stop