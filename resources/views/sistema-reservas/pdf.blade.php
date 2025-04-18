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

.client-list {
	border: 1px solid #CCC;
	border-radius: 4px;
	padding: 1rem;
	text-align: left;
}

.client-list table {
	width: 100%;
	border-collapse: collapse;
}

.client-list th, .client-list td {
	padding: 0.5rem;
	text-align: center;
	border-bottom: 1px solid #DDD
}

.client-list th {
	background-color: #F2F2F2;
}
</style>

<div class="container">
	<div class="content-box">
    <h1>Listado de Clientes</h1>

  <div class="client-list">
     <table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre y Apellido</th>
				<th>Teléfono</th>
				<th>Correo Electrónico</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
			<tr>
				<td>{{ $cliente->id }}</td>
				<td>{{ $cliente->nombre_completo }}</td>
				<td>{{ $cliente->telefono }}</td>
				<td>{{ $cliente->correo }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
  </div>
 </div>
</div>