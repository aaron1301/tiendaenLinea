@extends('principal')

@section('contenido')
<div class="container">
    <div class="row">
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
                                    <li><a href="#">Configurar Existentes</a></li>
                                    <li><a href="{{url('/nuevoArticulo')}}">Generar Nuevo Articulo </a></li>
                                    <li><a href="#">Generar Articulos por CSV </a></li>                                    
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
                                    <li><a href="#">Configurar Existentes</a></li>
                                    <li><a href="#">Generar Nueva Categoria</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="#">Moderar Comentarios</a></h4>
                        </div>
                    </div>

                </div>          
            </div>        

        </div>
    </div>

    @endsection