@extends('layouts.principal')

@section ('contenido')

<div id="contact-page" class="container">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{url('/inicio')}}">Inicio</a></li>
				<li class="active">Perfil</li>
			</ol>
		</div>
		<div class="bg">			   	
			<div class="row">				
				<div class="col-sm-4">
					<div class="contact-info">
						<h2 class="title text-center">Mi Informacion</h2>
						<address>
							<p>Nombre: {{$usuario->name}}</p>
							<p>Correo: {{$usuario->email}}</p>
							<p>Direccion: {{$usuario->direccion}}</p>				
							<p>Telefono: {{$usuario->telefono}}</p>
						</address>						
					</div>
				</div>    			
			</div>  
		</div>	
	</div>

	<section id="cart_items">			
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>					
					<tr class="cart_menu">
						<td class="description">Pedido</td>
						<td class="description">Direccion</td>						
						<td class="description">Fecha</td>
						<td class="total">Total</td>							
						<td></td>
					</tr>
				</thead>
				<tbody>						
					@foreach($pedidos as $p)
					<tr>							
						<td class="cart_description">								
							<p>{{$p->id}}</p>
						</td>
						<td class="cart_description">								
							<p>{{$p->direccion}}</p>
						</td>
						<td class="cart_description">								
							<p>{{$p->created_at}}</p>
						</td>							
						<td class="cart_total">
							<p class="cart_total_price">${{$p->total}}</p>
						</td>
						
						<td>
							<a href="{{url('/generarComprobante')}}/{{$p->id}}" target="_blank">
								<i class="fa fa-file-text"> Generar Comprobante </i>
							</a>								
						</td>
					</tr>
					@endforeach						
					
				</tbody>
			</table>
		</div>
	</div>
</section>





@stop

