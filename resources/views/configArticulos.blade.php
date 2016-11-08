@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
        <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Costo</th>
            <th>Categoria</th>
        </tr>
    </thead>

    <tbody>
        @foreach($articulos as $a)
        <tr>
            <td>{{$a->codigo}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->precio}}</td>
            <td>{{$a->descripcion}}</td>
            <td>{{$a->costo}}</td>
            <td>{{$a->categoria}}</td>
            <td>
                <a href="{{url('/configurarArticulo')}}/{{$a->codigo}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Configurar</span>
                </a>                
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
