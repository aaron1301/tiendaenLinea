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
		
		<div class="product-details"><!--product-details-->
						@foreach($articulo as $a)
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/product-details/1.jpg" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$a->codigo}}.- {{$a->nombre}}</h2>
								<p></p>
								<span>
									<span>${{$a->precio}}</span>
								</span>
								<p><b>Costo:</b> ${{$a->costo}}</p>
								<p><b>Descripción:</b> {{$a->descripcion}}</p>
							</div><!--/product-information-->
						</div>
						@endforeach
		</div><!--/product-details-->
	</div>
</div>


@stop

