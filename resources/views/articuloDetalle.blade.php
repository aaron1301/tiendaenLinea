@extends('layouts.principal')

@section('breadcrum')
<li><a href="{{url('articulosCategoria')}}/{{$categoria->id}}">{{$categoria->nombre}}</a></li>
<li><a href="{{url('articuloDetalle')}}/{{$articulo->codigo}}">{{$articulo->nombre}}</a></li>
@endsection

@section ('contenido')
<div class="container">
	<div class="row">	
		<div class="product-details">		
			<div class="col-sm-5">
				<div class="view-product">
					<img src="{{asset("imagenes/articulos/$articulo->codigo.jpg")}}" alt="" />
				</div>
			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->
					<h2>{{$articulo->codigo}}.- {{$articulo->nombre}}</h2>
					<p></p>
					<span>
						<span>${{$articulo->precio}}</span>
					</span>
					<p><b>Costo:</b> ${{$articulo->costo}}</p>
					<p><b>Descripción:</b> {{$articulo->descripcion}}</p>
				</div>
			</div>			
		</div>
	</div>
</div>


@stop

