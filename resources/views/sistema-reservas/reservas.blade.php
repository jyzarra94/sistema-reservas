@extends('layouts.app')

@section('title', 'Vista de Reservas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/reserva.css')}}">
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
     	Reservas Realizadas por: {{$cliente->nombre_completo}}
     </h1>

     <p>Éstas son las Reservas de un cliente en Particular</p>

     <p>Aquí se muestran todas las reservas de un solo cliente, pulsa en "Detalles" para más información de la Reserva seleccionada</p>

    <div class="btn-container">
     <a href="{{ route('mostrar', $cliente)}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

     <a href="{{ route('reservar', $cliente) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear Nueva Reserva</a>
   </div>

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
			@foreach($reservas as $reserva)
			<tr>
				<td>{{ $reserva->fecha_visita }}</td>
				<td>{{ $reserva->hora_visita }}</td>
				<td>{{ $reserva->cantidad_personas }}</td>
				<td>{{ $reserva->estado }}</td>
				<td>
					<a href="{{ route('mostrar-reserva', [$reserva, $cliente]) }}" class="btn btn-primary">Detalles</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    </div>

    <div class="d-flex justify-content-center">
    	{{ $reservas->links() }}
    </div>

    <br>

      <div class="btn-reservation">
	  <a href="{{ route('pdf-reserva', $cliente) }}" target="-blank" class="btn btn-danger"><i class="far fa-file"></i> Exportar a PDF</a>
     </div>

  </div>
</div>
@endsection