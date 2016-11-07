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
                                    <li><a href="#">Generar Nuevo Articulo </a></li>
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
        <div class="col-sm-9 padding-right">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Articulo</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/generarArticulo')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input name="nombre" type="text" class="form-control" required>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio" class="col-md-4 control-label">Precio:</label>
                            <div class="col-md-6">
                                <input name="precio" type="number" class="form-control" required>                                
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input name="descripcion" type="text" class="form-control" required>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="costo" class="col-md-4 control-label">Costo:</label>
                            <div class="col-md-6">
                                <input name="costo" type="number" class="form-control" required>                                
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoria</label>
                            <div class="col-md-6">
                                <select name="categoria" class="form-control" required>
                                    <option value="">Categoria</option>                                    
                                    @foreach($categorias as $c)                                    
                                    <option value="{{$c->id}}">{{$c->nombre}}</option>                                    
                                    @endforeach                                    
                                </select>                               
                            </div>
                        </div>           

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Generar Articulo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            

        </div>



    </div>

    @endsection
