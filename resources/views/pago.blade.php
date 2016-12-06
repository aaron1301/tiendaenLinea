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
						<div class="shopper-info">
							<p>Direccion</p>							
							<form id="form1" method="POST" action="{{url('realizarPago')}}">						
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="total" value="{{$total}}">	
								<input type="text" name="direccion" placeholder="Direccion" value="{{$usuario->direccion}}" required>													
							</form>								
						</div>
					</div>								
				</div>
			</div>
	</div>
</section>

<section id="cart_items">
	<div class="container">
		<div class="step-one">
			<h2 class="heading">Informacion de Pago</h2>
		</div>		
	</div>
	
</section>

<section id="do_action">
	<div class="container">			
		<div class="row">				
			<div class="col-sm-4">
				<div class="chose_area">					
					<ul class="user_info">
						<li>
							<label>Numero de Tarjeta:</label>
							<input type="number"  form="form1" required>
						</li>
						<li >
							<label>Nombre del Titular:</label>
							<input type="text"  form="form1" required>
						</li>
						<li>
							<label>Banco:</label>
							<input type="text"  form="form1" required >			
						</li>

						
						
						
					</ul>
					<ul>
						<li><input type="submit" class="btn btn-primary" value="Realizar Pago" form="form1"></li>
					</ul>
					
					
				</div>
				
			</div>

			<div class="col-sm-4">
				<div class="total_area">
					<ul>
						<li>Subtotal <span>${{$total}}</span></li>							
						<li>Envio<span>Gratis</span></li>
						<li>Total <span>${{$total}}</span></li>
					</ul>							
				</div>
			</div>
		</div>
	</div>
</section>			

		
@stop