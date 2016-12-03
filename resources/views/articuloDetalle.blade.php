@extends('layouts.principal')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="breadcrumbs">
	        <ol class="breadcrumb">
	        	<li><a href="{{url('inicio')}}">Inicio</a></li>                  
	        	<li><a href="{{url('articulosCategoria')}}/{{$categoria->id}}">{{$categoria->nombre}}</a></li>
	        	<li><a href="{{url('articuloDetalle')}}/{{$articulo->codigo}}">{{$articulo->nombre}}</a></li>
	      </ol>
	    </div>	
		<div class="col-sm-12">
			<div class="product-details">		
				<div class="col-sm-4">
					<div class="view-product">
						<img src="{{asset("imagenes/articulos/$articulo->codigo.jpg")}}" alt="" />
					</div>
				</div>
				<div class="col-sm-8">
					<div class="product-information">
						<form id="form1" method="POST" action="{{url('/agregaraCarrito')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">							
							<input type="hidden" name="articulo" value="{{$articulo->codigo}}">							
						</form>
						<h2>{{$articulo->nombre}}</h2>
						<p>Codigo: {{$articulo->codigo}}</p>
						<span>
							<span>${{$articulo->precio}}</span>
							<label>Cantidad:</label>
							<input type="number" name="cantidad" min="1" max="{{$inventario->cantidad}}" value="1" form="form1">
							@if($inventario->cantidad==0)						
							<button type="submit" class="btn btn-fefault cart" form="form1">
								<i class="fa fa-shopping-cart"></i>
								Añadir al Carrito
							</button>
							@else
							<button type="submit" class="btn btn-fefault cart" form="form1">
								<i class="fa fa-shopping-cart"></i>
								Añadir al Carrito
							</button>
							@endif
						</span>						
						<p><b>Disponibilidad:</b>
						@if($inventario->cantidad==0)
							No disponible por el momento
						@else
							Disponible
						@endif
						</p>			
																	
					</div>					
					
				</div>			

			</div>
			
		</div>
		

		<div class="col-sm-12">
			<div class="category-tab shop-details-tab">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#descripcion" data-toggle="tab">Descripcion</a></li>						
						<li><a href="#reviews" data-toggle="tab">Comentarios</a></li>
						<li><a href="#calificar" data-toggle="tab">Calificar</a></li>
					</ul>
				</div>

				<div class="tab-content">
					<div class="tab-pane fade active in" id="descripcion" >
						<p>{{$articulo->descripcion}}</p>
					</div>					

					<div class="tab-pane fade" id="reviews" >
						<div class="col-sm-12" id="comentar">
							@foreach($comentarios as $c)
							<ul>
								<li><a href=""><i class="fa fa-user"></i>{{$c->name}}</a></li>
								<li><a href=""><i class="fa fa-clock-o"></i>{{date('H:i:s',strtotime($c->created_at))}}</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>{{date('Y-m-d',strtotime($c->created_at))}}</a></li>
							</ul>
							<p>{{$c->contenido}}</p>
							@endforeach

							@if(!Auth::guest() && $comentario_usuarioactual==null)						
							<p><b>Escribe tu comentario</b></p>
							<form method="POST" action="{{url('/comentarArticulo')}}/{{$articulo->codigo}}">
								<input type="hidden" name="_token" value="{{csrf_token()}}">								
								<textarea name="comentario" required></textarea>								
								<button type="submit" class="btn btn-default pull-right">
									Comentar
								</button>
							</form>							
							@endif	

						</div>
						
					</div>

					<div class="tab-pane fade" id="calificar" >
						@if(!Auth::guest())
						<div class="col-md-2">
							<form class="form-horizontal" method="POST" action="{{url('/calificarArticulo')}}/{{$articulo->codigo}}">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<select name="calificacion" required>
									@for ($i=0;$i<=10;$i++)
										@if($calificacion == null)
											<option value="{{$i}}">{{$i}}</option>
										@elseif($calificacion->valor==$i)
											<option value="{{$i}}" selected>{{$i}}</option>
										@else
											<option value="{{$i}}">{{$i}}</option>	

										@endif
									@endfor
								</select>
								<button type="submit" class="btn btn-primary">Calificar</button>							
							</form>
						</div>	
						@endif
					</div>

				</div>
			</div>
		</div>


		
	</div>
</div>


@stop

