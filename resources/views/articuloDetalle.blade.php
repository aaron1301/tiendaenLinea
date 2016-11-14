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

						<div class="col-sm-12" id="comentar">
							@if(!Auth::guest())
							<p><b><h3>Escribe tu comentario</h3></b></p>

							<form method="POST" action="{{url('/comentarArticulo')}}/{{$articulo->codigo}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">								
								<textarea name="comentario" required></textarea>								
								<button type="submit" class="btn btn-default pull-right">
									Comentar
								</button>
							</form>
							@endif							
						</div>

						<div class="media commnets">
						<p><b><h3>Comentarios</h3></b></p>
						<div class="media-body">
							<h4 class="media-heading">cesar</h4>
							<p>comentario</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
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

