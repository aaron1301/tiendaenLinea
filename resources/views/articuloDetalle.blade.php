@extends('layouts.principal')

@section('breadcrum')
<li><a href="{{url('articulosCategoria')}}/{{$categoria->id}}">{{$categoria->nombre}}</a></li>
<li><a href="{{url('articuloDetalle')}}/{{$articulo->codigo}}">{{$articulo->nombre}}</a></li>
@endsection

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="product-details">		
				<div class="col-sm-5">
					<div class="view-product">
						<img src="{{asset("imagenes/articulos/$articulo->codigo.jpg")}}" alt="" />
					</div>
				</div>
				<div class="col-sm-7">
					<div class="product-information"><!--/product-information-->
						<h2>{{$articulo->nombre}}</h2>
						<p>Codigo: {{$articulo->codigo}}</p>
						<span>
							<span>${{$articulo->precio}}</span>
							<button type="button" class="btn btn-fefault cart">
								<i class="fa fa-shopping-cart"></i>
								Comprar
							</button>
						</span>
						<p><b>Disponibilidad:</b></p>				
																	
					</div>

					
					
				</div>			

			</div>
			
		</div>

		<div class="col-sm-9">

		</div>

		<div class="col-sm-9">
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
						<div class="col-sm-12">
							<ul>
								<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
								<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>							
						</div>
						<div class="col-sm-12">
							@if(!Auth::guest())
							<p><b>Escribe tu comentario</b></p>

							<form action="#">								
								<textarea name="" ></textarea>								
								<button type="button" class="btn btn-default pull-right">
									Comentar
								</button>
							</form>
							@endif							
						</div>
					</div>

					<div class="tab-pane fade" id="calificar" >
						@if(!Auth::guest())
						<div class="col-md-4">
							<form class="form-horizontal" method="POST" action="{{url('/calificarArticulo')}}/{{$articulo->codigo}}">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<select name="calificacion" required>
									@for ($i=0;$i<=10;$i++)
									<option value="{{$i}}">{{$i}}</option>
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

