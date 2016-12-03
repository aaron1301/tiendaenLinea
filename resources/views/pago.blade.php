@extends('layouts.principal')

@section ('contenido')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{url('/inicio')}}">Inicio</a></li>
				<li class="active">Realizar Pago</li>
			</ol>
		</div>

		<div class="step-one">
			<h2 class="heading">Datos de Envio</h2>
		</div>		

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3">
					<div >
						<p>Shopper Information</p>
						<form class="form-action" id="form1" method="POST" action="{{url('realizarPago')}}">						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="total" value="{{$total}}">	
							<input type="text" name="direccion" placeholder="Direccion" value="{{$usuario->direccion}}" required>													
						</form>						
					</div>
				</div>				
							
			</div>
		</div>

		<div class="step-one">
			<h2 class="heading">Informacion de Pago</h2>
		</div>
		<div class="form-action"> 
			<input type="number" placeholder="No de tarjeta" form="form1" required>
			
			
						
		</div>
		<div>
			<input type="text" placeholder="Nombre del Titular" form="form1" required>
		</div>

		<div class="form-action">
			<input type="text" placeholder="Banco" form="form1" required >
		</div>
		<div class="form-action">
			<input type="submit" class="btn btn-primary" value="Realizar Pago" form="form1">		
		</div>
		

	</div>
</section>
@stop