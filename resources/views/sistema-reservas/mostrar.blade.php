@extends('layouts.app')

@section('title', 'Detalles del Cliente')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/mostrar.css')}}">
<link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
@endsection

<style>
	body {
		background-image: url('{{ asset('images/Fondo.jpg') }}');
        background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	}
</style>

@section('content')

<div class="container">
	<div class="content-box">
     <h1>
     	!Saludos¡ Cliente Nº {{$cliente->id}}: {{$cliente->nombre_completo}}
     </h1>

     <p>Aquí se muestran todos los datos, opciones y reservas acerca del Cliente Nº {{$cliente->id}}</p>

	<a href="{{ route('vista')}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

	    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="client-list">
		<table class="table table-light table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre y Apellido</th>
				<th>Teléfono</th>
				<th>Correo Electrónico</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $cliente->id }}</td>
				<td>{{ $cliente->nombre_completo }}</td>
				<td>{{ $cliente->telefono }}</td>
				<td>{{ $cliente->correo }}</td>
				<td>
					<div class="btn-group">
						<a href="{{ route('editar', $cliente) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

					    <a href="{{ route('aviso', $cliente) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
    </div>

    <br>

   <div class="btn-reservation">
	<a href="{{ route('reserva', $cliente) }}" class="btn btn-primary"><i class="fas fa-eye"></i> Ver Reservas</a>
   </div>
</div>
</div>
@endsection