@extends('layouts.principal')

@section ('contenido')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Inicio</a></li>
				  <li class="active">Carrito de Compra</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Precio</td>							
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Nombre Producto</a></h4>
								<p>Codigo</p>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>		
						
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<section id="do_action">
		<div class="container">			
			<div class="row">				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>IVA <span>$2</span></li>
							<li>Envio <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>							
							<a class="btn btn-default check_out" href="">Completar Pedido</a>
					</div>
				</div>
			</div>
		</div>
	</section> 
@stop