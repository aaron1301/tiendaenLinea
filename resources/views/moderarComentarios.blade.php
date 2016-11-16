@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Contenido</th>
            <th>Usuario</th>
            <th>Articulo</th>
        </tr>
    </thead>

    <tbody>
        @foreach($comentario as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->contenido}}</td>
            <td>{{$c->usuario}}</td>
            <td>{{$c->articulo}}</td>
            <td>
                <a href="{{url('/moderarComentario')}}/{{$c->id}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Moderar</span>
                </a>                
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
