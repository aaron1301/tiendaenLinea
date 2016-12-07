<!DOCTYPE html>
<html>
<head>
	<title>Pedido: {{$pedido->id}}</title>
	<style>
		table, td, th {    
			border: 1px solid #ddd;
			text-align: left;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 15px;
		}
	</style>
</head>
<body>
	<h2>Gracias Por su compra</h2>
	<h3>Pedido: {{$pedido->id}}</h3>
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