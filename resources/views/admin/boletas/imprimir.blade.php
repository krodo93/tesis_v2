<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title></title>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<div class="card">
				<img src="/logo_header.png" class="card-img-top" alt="..." style="max-width: 70%">
				<div class="card-body">
					<h3 class="card-title">Boleta de Registro</h3>
					<div class="row">
						<div class="col-md-6">
							<p><h5>No de boleta:</h5> {{ $boleta->factura}}</p>
							<p><h5>Usuario:</h5> {{ $boleta->usuario}}</p>
						</div>
						<div class="col-md-6">
							<p><h5>Conductor:</h5> {{ $boleta->conductor}}</p>
							<p><h5>Placa:</h5> {{ $boleta->camion}}</p>
							<p><h5>Turno:</h5> {{ $boleta->turno}}</p>
						</div>
					</div>
				</div>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Peso</th>
							<th scope="col">Precio</th>
							<th scope="col">Total</th>
							<th scope="col">Fecha/Hora</th>
						</tr>
					</thead>
					<tbody>
						@foreach($boleta_detalles as $item)
						<tr>
							<td>{{$item->peso}}</td>
							<td>${{ number_format($item->precio,2) }}</td>
							<td>${{	number_format($item->total,2)}}</td>
							<td>{{$item->pesada}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>
</html>
