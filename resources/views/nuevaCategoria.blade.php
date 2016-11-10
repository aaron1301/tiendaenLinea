@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Nuevo Articulo</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{url('/generarCategoria')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="nombre" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input name="nombre" type="text" class="form-control" required>                                
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Generar Categoria</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
