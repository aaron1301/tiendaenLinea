@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>       
            <th>Fecha</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pedidos as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->usuario}}</td>            
            <td>{{$p->created_at}}</td>
            <td>
                <a href="{{url('/verPedido')}}/{{$p->id}}" class="btn btn-xs btn-primary">Ver Detalle</a>                
            </td>                       
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
