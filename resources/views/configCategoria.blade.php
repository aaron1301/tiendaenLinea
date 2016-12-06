@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Catégoria: {{$categoria->id}}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{url('/actualizarCategoria')}}/{{$categoria->id}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="nombre" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input name="nombre" type="text" class="form-control" value="{{$categoria->nombre}}" required>
                </div>
                <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                <div class="col-md-6">
                    <input name="descripcion" type="text" class="form-control" value="{{$categoria->descripcion}}" required>
                </div>
                <label for="imagen" class="col-md-4 control-label">Imagen</label>
                 <div class="col-md-6">
                    <input name="imagen" type="file" class="form-control" accept=".jpg">                                
                </div>
            </div>
             <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{url('/configurarCategorias')}}" class="btn btn-primary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection
