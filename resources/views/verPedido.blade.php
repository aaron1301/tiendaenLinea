@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Articulo</th>           
        </tr>
    </thead>

    <tbody>
        @foreach($pedidos as $p)
        <tr>
            <td>{{$p->id}}</td>                        
            <td>{{$p->articulo}}</td>                       
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
