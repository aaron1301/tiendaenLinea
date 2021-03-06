@extends('layouts.principal')

@section('breadcrum')
                    

@endsection

@section('contenido')

<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{url('inicio')}}">Inicio</a></li>                  
          <li class="active">Administrar</li>
      </ol>
    </div>
    <div class="row">
    @can('acceso_admin')
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Opciones</h2>
                <div class="panel-group category-products" id="accordian">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#articulos">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Configurar Articulos
                                </a>
                            </h4>
                        </div>
                        <div id="articulos" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="{{url('/configurarArticulos')}}">Configurar Existentes</a></li>
                                    <li><a href="{{url('/nuevoArticulo')}}">Generar Nuevo Articulo </a></li>
                                    <li><a href="{{url('/importarCSV')}}">Generar Articulos por CSV </a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#categorias">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Configurar Categorias
                                </a>
                            </h4>
                        </div>
                        <div id="categorias" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="{{url('/configurarCategorias')}}">Configurar Existentes</a></li>
                                    <li><a href="{{url('/nuevaCategoria')}}">Generar Nueva Categoria</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{url('/moderarComentarios')}}">Moderar Comentarios</a></h4>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{url('/verPedidos')}}">Ver Pedidos</a></h4>
                        </div>
                    </div>

                </div>          
            </div>        

        </div>

        <div class="col-sm-9 padding-right">
        @yield('contenido_administrar')            
        </div>
        @endcan

        @cannot('acceso_admin')
        <div class="container text-center">
            <div class="logo-404">
                <a href="index.html"><img src="imagenes/inicio/logoo.png" alt="" /></a>
            </div>
            <div class="content-404">
                <img src="imagenes/inicio/alto.png" class="img-responsive" alt="" />
                <h1><b>OPPS!</b> Lo sentimos, usted no es un ADMINISTRADOR</h1>
                <p>Usted no puede ingresar a esta seccion ya que no tiene credenciales de administrador.</p>
                <a href="{{url('/inicio')}}"><button type="button" class="btn btn-default get"><h4>Ir a Inicio</h4></button></a>
            </div>
            <div class="col-sm-12">
                <div class="companyinfo">
                </div>
            </div>
        </div>
        @endcannot

    </div> 

    @endsection 
