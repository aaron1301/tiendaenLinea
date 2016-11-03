@extends('principal')

@section ('contenido')
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
				</div><!--/category-products-->
			</div>
		</div>

		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">Articulos</h2>
				@foreach($articulos as $a)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="" alt="" />
									<h2>${{$a->precio}}</h2>
									<p>{{$a->nombre}}</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>${{$a->precio}}</h2>
										<p>{{$a->nombre}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
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

@stop