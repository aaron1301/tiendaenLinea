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
							<td class="quantity">Cantidad</td>
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

								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_down" href=""> - </a>									
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$a->cantidad}}" autocomplete="off" size="2">
										<a class="cart_quantity_up" href=""> + </a>
										
									</div>
								</td>
								
								<td class="cart_total">
									<p class="cart_total_price"></p>
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
							<td colspan="2">&nbsp;</td>
							<td colspan="2">
								<!-- <table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>IVA</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Envio</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>

									</tr>

								</table> -->								
								
								@if(!$articulos->isEmpty())								
									<a class="btn btn-default check_out" href="{{url('/finalizarCompra')}}">Finalizar Compra</a>
								@endif									
							</td>


						</tr>		
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
@stop