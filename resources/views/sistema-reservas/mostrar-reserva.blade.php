@extends('layouts.app')

@section('title', 'Detalles de la Reserva')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/mostrar-reserva.css')}}">
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
     	Reserva Seleccionada del Cliente: {{$cliente->nombre_completo}}
     </h1>

     <p>En la Reserva Seleccionada puedes Editar o Eliminar la Reserva que se seleccionó</p>

     <a href="{{ route('reserva', $cliente) }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

  <div class="reservation-list">
     <table class="table table-light table-striped">
		<thead>
			<tr>
				<th>Fecha de la Visita</th>
				<th>Hora de la Visita</th>
				<th>Cantidad de personas que va a llevar</th>
				<th>Estado de la Mesa</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $reserva->fecha_visita }}</td>
				<td>{{ $reserva->hora_visita }}</td>
				<td>{{ $reserva->cantidad_personas }}</td>
				<td>{{ $reserva->estado }}</td>
				<td>
					<div class="btn-group">
						<a href="{{ route('editar-reserva', [$reserva, $cliente]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

						<a href="{{ route('aviso-reserva', [$reserva, $cliente]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>

					</div>
				</td>
			</tr>
		</tbody>
	</table>
    </div>
  </div>
</div>
@endsection