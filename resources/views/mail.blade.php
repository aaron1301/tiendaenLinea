<!DOCTYPE html>
<html>
<head>
	<title>Confirmacion</title>
</head>
<body>
	<p>Pedio: {{$pedido->id}}</p>
	<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Articulo</th>           
        </tr>
    </thead>

    <tbody>
        @foreach($detalle as $p)
        <tr>
            <td>{{$p->id}}</td>                        
            <td>{{$p->articulo}}</td>                       
        </tr>
        @endforeach

    </tbody>
</table>



</body>
</html>