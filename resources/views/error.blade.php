@extends('layouts.principal')

@section ('contenido')


<section id="do_action">
	<div class="container">		
		<div class="row text-center">
			<div class="heading">
				<img src="{{asset("imagenes/error.png")}}">
				<h1>Se ha producido un error</h1>
				<a href="{{url('/inicio')}}" class="btn btn-primary">Volver a inicio</a>
				
			</div>
		</div>
		
		
	</div>
</section>




@stop