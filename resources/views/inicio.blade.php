@extends('layouts.principal')

@section ('contenido')
<section id="slider"><!--carrucel inicio-->

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
					@foreach($categorias as $ca)
						<li data-target="#slider-carousel" data-slide-to="{{$ca->id}}"></li>
					@endforeach
					</ol>
					<div class="carousel-inner">

						<div class="item active">
							<div class="col-sm-6">
								<h1><span>Tienda</span> En Linea</h1>
								<h2>Bienvenido</h2>
								<p>La tienda en linea le facilitará la forma en que realiza compras de distintos articulos desd la comodidad de su hogar</p>
							</div>
							<div class="col-sm-6">
								<img src="{{asset("imagenes/inicio/bienvenida.jpg")}}" class="girl img-responsive" alt="" />	<img src=""  class="pricing" alt="" />
							</div>
						</div>

						@foreach($categorias as $cate)
						<div class="item">
							<div class="col-sm-6">
								<h1><span>Tienda</span> En Linea</h1>
								<h2>{{$cate->nombre}}</h2>
								<p>{{$cate->descripcion}}</p>
								<a href="{{url('articulosCategoria')}}/{{$cate->id}}"><button type="button" class="btn btn-default get">¡Ver Más!</button></a>
							</div>
							<div class="col-sm-6">
								<img src="{{asset("imagenes/categorias/$cate->id.jpg")}}" class="girl img-responsive" alt="" />
								<img src=""  class="pricing" alt="" />
							</div>
						</div>
						@endforeach
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

</section><!--Carrusel fin-->

<section><!--Seccion de categorias-->
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Categorias</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default">
							<div class="panel-heading">
								@foreach($categorias as $c)
								<h4 class="panel-title"><a href="{{url('/articulosCategoria')}}/{{$c->id}}">{{$c->nombre}}</a></h4>
								@endforeach
							</div>
						</div>

					</div>
					
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Articulos Populares</h2>
					@foreach($articulos_populares as $a)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{asset("imagenes/articulos/$a->codigo.jpg")}}">									
									<h2>${{$a->precio}}</h2>
									<p>{{$a->nombre}}</p>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>${{$a->precio}}</h2>
										<p>{{$a->nombre}}</p>
										<a href="{{url('articuloDetalle')}}/{{$a->codigo}}" class="btn btn-default add-to-cart">Ver Más</a>
									</div>
								</div>
							</div>									
						</div>
					</div>
					@endforeach		
				</div>
			</div>
		</div>
	</div>
</section>
@stop