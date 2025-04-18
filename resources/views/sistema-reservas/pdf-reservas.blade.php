<style>
	body {
	font-family: 'Poppins', sans-serif;
	margin: 0;
	padding: 0;
}

.container {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}

.content-box {
	background-color: white;
	padding: 2rem;
	border-radius: 8px;
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	width: 80%;
	max-width: 900px;
	text-align: center;
}

.content-box h1 {
	margin-top: 0;
	text-align: center;
}

.reservation-list {
	border: 1px solid #CCC;
	border-radius: 4px;
	padding: 1rem;
	text-align: left;
}

.reservation-list table {
	width: 100%;
	border-collapse: collapse;
}

.reservation-list th, .reservation-list td {
	padding: 0.5rem;
	text-align: center;
	border-bottom: 1px solid #DDD
}

.reservation-list th {
	background-color: #F2F2F2;
}
</style>

<div class="container">
	<div class="content-box">
    <h1>Listado de Reservas: {{$cliente->nombre_completo}}</h1>

  <div class="reservation-list">
     <table class="table">
		<thead>
			<tr>
				<th>Fecha de la Visita</th>
				<th>Hora de la Visita</th>
				<th>Cantidad de personas que va a llevar</th>
				<th>Estado de la Mesa</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reservas as $reserva)
			<tr>
				<td>{{ $reserva->fecha_visita }}</td>
				<td>{{ $reserva->hora_visita }}</td>
				<td>{{ $reserva->cantidad_personas }}</td>
				<td>{{ $reserva->estado }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
  </div>
 </div>
</div>