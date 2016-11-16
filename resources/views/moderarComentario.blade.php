@extends('layouts.administrar')

@section('contenido_administrar')
<div class="panel panel-default">
    <div class="panel-heading">Comentario {{$comentario->id}}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{url('/actualizarComentario')}}/{{$comentario->id}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="nombre" class="col-md-4 control-label">Comentario</label>
                <div class="col-md-6">
                    <input name="comentario" type="text" class="form-control" value="{{$comentario->contenido}}" required>
                </div>
            </div>
             <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{url('/moderarComentarios')}}" class="btn btn-primary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection
