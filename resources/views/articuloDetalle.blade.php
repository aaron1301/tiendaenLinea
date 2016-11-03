@extends('principal')

@section ('contenido')

<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-area">
						<h2 class="title text-center">Caracteristicas del artículo</h2>
						<div class="single-blog-post">
							
							@foreach($articulo as $a)
							<h2 class="title text-center"> {{$a->codigo}}.- {{$a->nombre}}</h2>	


							
							
							<!--/
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							-->
							<a href="">
								<img src="images/blog/blog-one.jpg" alt=""  class="title text-center">
							</a>
							<h3 class="title text-center">Precio: {{$a->precio}}</h3>
							<h3 class="title text-center">Descipción: </h3>
							<h4 class="title text-center">{{$a->descripcion}}</h4>
							<h3 class="title text-center">Costo: {{$a->costo}}</h3>

							@endforeach
						</div>
					</div><!--/blog-post-area-->					
				</div>	
			</div>
		</div>

@stop