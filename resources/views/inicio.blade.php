@extends('layouts.principal')

@section ('contenido')
<section id="slider"><!--carrucel inicio-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Free E-Commerce Template</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								<button type="button" class="btn btn-default get">Get it now</button>
							</div>
							<div class="col-sm-6">
								<img src="" class="girl img-responsive" alt="" />
								<img src=""  class="pricing" alt="" />
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>100% Responsive Design</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								<button type="button" class="btn btn-default get">Get it now</button>
							</div>
							<div class="col-sm-6">
								<img src="" class="girl img-responsive" alt="" />
								<img src=""  class="pricing" alt="" />
							</div>
						</div>		
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
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="{{url('articuloDetalle')}}/{{$a->codigo}}"><i class="fa fa-plus-square"></i>Ver Informacion</a></li>
								</ul>
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