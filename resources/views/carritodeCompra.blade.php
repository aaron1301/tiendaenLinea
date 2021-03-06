@extends('layouts.principal')

@section ('contenido')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/inicio')}}">Inicio</a></li>
				  <li class="active">Carrito de Compra</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Articulo</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="description">Cantidad</td>
							<td class="total">Total</td>							
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(!$articulos->isEmpty())
							@foreach($articulos as $a)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{asset("imagenes/articulos/$a->codigo.jpg")}}" width="100px"></a>
								</td>
								<td class="cart_description">
									<h4><a href="{{url('articuloDetalle')}}/{{$a->codigo}}">{{$a->nombre}}</a></h4>
									<p>{{$a->codigo}}</p>
								</td>

								<td class="cart_price">
									<p>${{$a->precio}}</p>
								</td>

								<td class="cart_description">
									<p>{{$a->cantidad}}</p>
								</td>
								
								<td class="cart_total">
									<p class="cart_total_price">${{$a->precio*$a->cantidad}}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{url('/quitardelCarrito')}}/{{$a->id}}"><i class="fa fa-times"></i></a>								
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td colspan="4">
								<center><h2>Su carrito de compra esta vacio</h3></center>
							</td>
						</tr>
						@endif
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Subtotal</td>
										<td>${{$total}}</td>
									</tr>									
									<tr class="shipping-cost">
										<td>Envio</td>
										<td>Gratis</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{$total}}</span></td>

									</tr>

								</table>								
								
								@if(!$articulos->isEmpty())
								<form class="form-action" id="form1" method="POST" action="{{url('/finalizarCompra')}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="total" value="{{$total}}">	
									<input type="submit" class="btn btn-default check_out" value="Finalizar Compra">
								</form>									
								@endif									
							</td>


						</tr>		
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
@stop