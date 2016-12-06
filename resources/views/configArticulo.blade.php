@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Articulo: {{$articulo->codigo}}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{url('/actualizarArticulo')}}/{{$articulo->codigo}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="nombre" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input name="nombre" type="text" class="form-control" value="{{$articulo->nombre}}" required>                                
                </div>
            </div>

            <div class="form-group">
                <label for="precio" class="col-md-4 control-label">Precio:</label>
                <div class="col-md-6">
                    <input name="precio" type="number" class="form-control" value="{{$articulo->precio}}" required>                                
                </div>                            
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-md-4 control-label">Descripcion</label>
                <div class="col-md-6">
                    <input name="descripcion" type="text" class="form-control" value="{{$articulo->descripcion}}">                                
                </div>
            </div>

            <div class="form-group">
                <label for="costo" class="col-md-4 control-label">Costo:</label>
                <div class="col-md-6">
                    <input name="costo" type="number" class="form-control" value="{{$articulo->costo}}" required>                                
                </div>                            
            </div>

            <div class="form-group">
                <label for="categoria" class="col-md-4 control-label">Categoria</label>
                <div class="col-md-6">
                    <select name="categoria" class="form-control" required>                                                           
                        @foreach($categorias as $c)
                            @if($articulo->categoria == $c->id)                                    
                                <option value="{{$c->id}}" selected>{{$c->nombre}}</option>
                            @else
                                <option value="{{$c->id}}">{{$c->nombre}}</option>
                            @endif                                      
                        @endforeach                                    
                    </select>                               
                </div>
            </div>

            <div class="form-group">
                <label for="cantidad" class="col-md-4 control-label">Cantidad en Inventario:</label>
                <div class="col-md-6">
                    <input name="cantidad" type="number" class="form-control" value="{{$inventario->cantidad}}" required>                                
                </div>                            
            </div>

            <div class="form-group">
                <label for="imagen" class="col-md-4 control-label">Imagen</label>
                <div class="col-md-6">
                    <input name="imagen" type="file" class="form-control" accept=".jpg">                                
                </div>
            </div>           

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{url('/configurarArticulos')}}" class="btn btn-primary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
