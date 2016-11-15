@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categorias as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->nombre}}</td>
            <td>{{$c->descripcion}}</td>
            <td>
                <a href="{{url('/configurarCategoria')}}/{{$c->id}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Configurar</span>
                </a>                
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
