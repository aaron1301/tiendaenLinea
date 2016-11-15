@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Nuevo Articulo</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{url('/generarArticulo')}}"" enctype="multipart/form-data">
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
                    <input name="descripcion" type="text" class="form-control">                                
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
                <label for="imagen" class="col-md-4 control-label">Imagen</label>
                <div class="col-md-6">
                    <input name="imagen" type="file" class="form-control" accept="image/jpg">                                
                </div>
            </div>                

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Generar Articulo</button>
                    <a href="{{url('/administrar')}}" class="btn btn-primary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
