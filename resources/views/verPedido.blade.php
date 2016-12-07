@extends('layouts.administrar')

@section('contenido_administrar')
<table class="table table-hover">
    <thead>
        <tr>
            <td>Codigo </td>
            <td>  Nombre</td>
            <td>  Precio</td>
            <td>  Cantidad</td>
            <td>  Total</td>           
        </tr>
    </thead>

    <tbody>
        @foreach($pedidos as $p)
        <tr>
            <tr>                
                <td>{{$p->codigo}}</td> 
                <td>{{$p->nombre}}</td>

                <td>${{$p->precio}}</td>

                <td>{{$p->cantidad}}</td>

                <td>${{$p->precio*$p->cantidad}}</td>

            </tr>                       
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
