<!DOCTYPE html>
<html>
<head>
	<title>Pedido: {{$pedido->id}}</title>
</head>
<body>
	<h1>Pedido: {{$pedido->id}}</h1>
	<p>Direccion: {{$pedido->direccion}}</p>
	<p>Fecha: {{$pedido->created_at}}</p>
	<table >
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
			@foreach($detalle as $p)
			<tr>				
				<td>{{$p->codigo}}</td>	
				<td>{{$p->nombre}}</td>

				<td>${{$p->precio}}</td>

				<td>{{$p->cantidad}}</td>

				<td>${{$p->precio*$p->cantidad}}</td>

			</tr>
			@endforeach				

			<tr>
				<td colspan="3">&nbsp;</td>
				<td colspan="2">
					<table >
						<tr>
							<td></td>
						</tr>
						<tr>
							<td>Subtotal </td>
							<td> ${{$pedido->total}}</td>
						</tr>									
						<tr>
							<td>Envio</td>
							<td>Gratis</td>										
						</tr>
						<tr>
							<td>Total</td>
							<td><span>${{$pedido->total}}</span></td>

						</tr>

					</table>						


				</td>


			</tr>		

		</tbody>
	</table>

</body>
</html>