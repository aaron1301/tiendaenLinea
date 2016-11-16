<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tienda en Linea</title>
    <link href="{{asset ("css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset ("css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset ("css/prettyPhoto.css")}}" rel="stylesheet">    
    <link href="{{asset ("css/animate.css")}}" rel="stylesheet">
	<link href="{{asset ("css/main.css")}}" rel="stylesheet">
	<link href="{{asset ("css/responsive.css")}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->     

</head><!--/head-->

<body>
	<header id="header"><!--header-->	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">					
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('inicio')}}"><img src="{{asset ("imagenes/inicio/logoo.png")}}" alt="" /></a>
						</div>						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(Auth::guest())								
								<li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Ingresar</a></li>
								<li><a href="{{ url('/register') }}">Registrarme</a></li>
								@else
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
											{{ Auth::user()->name }} <span class="caret"></span>
										</a>

										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{{ url('/logout') }}"
												onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
												Cerrar Sesion
												</a>

												<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
													{{ csrf_field() }}
												</form>
											</li>
										</ul>
									</li>
									@can('acceso_admin')
										<li><a href="{{ url('/administrar') }}">Administrar</a></li>
									@endcan	
								@endif
								

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">					
					<div class="col-sm-9">						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('inicio')}}" class="active">Inicio</a></li>				
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->


	
	<section>
		<div class="container">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="{{url('inicio')}}">Inicio</a></li>
					@yield('breadcrum')					
				</ol>
			</div>
		</div>

		@yield('contenido')	
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="companyinfo">
							<h2><span>T</span>ienda en Linea</h2>
							<p>Tienda en linea para que puedas realizar tus compras desde la comodidad de tu hogar a cualesquier hora.</p>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="video-gallery text-center">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="video-gallery text-center">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="imagenes/inicio/map.png" alt="" />
							<p class="pull-right">Alcance a nivel mundial, disponible las 24 horas todos los dias.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Proveedores</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.motorola.com.mx/home">Motorola</a></li>
								<li><a href="https://www.microsoft.com/es-mx/">Microsoft</a></li>
								<li><a href="http://www.lg.com/mx">LG</a></li>
								<li><a href="http://www.samsung.com/mx/home/">Samsumg</a></li>
								<li><a href="http://www.lanix.com/">Lanix</a></li>
							</ul>
						</div>
					</div>	
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dudas y Aclaraciones</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.google.com.mx/">Google</a></li>
								<li><a href="https://espanol.yahoo.com/">Yahoo</a></li>
							</ul>
						</div>
					</div>	
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Redes Sociales</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.facebook.com/">Facebook</a></li>
								<li><a href="https://twitter.com/?lang=es">Twitter</a></li>
							</ul>
						</div>
					</div>	
				</div>
			</div>
		</div>


		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 Tienda en Linea.</p>					
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset ("js/jquery.js")}}"></script>
	<script src="{{asset ("js/bootstrap.min.js")}}"></script>
	<script src="{{asset ("js/jquery.scrollUp.min.js")}}"></script>	
    <script src="{{asset ("js/jquery.prettyPhoto.js")}}"></script>
    <script src="{{asset ("js/main.js")}}"></script>
</body>
</html>