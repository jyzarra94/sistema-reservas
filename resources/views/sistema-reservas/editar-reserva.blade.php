@extends('layouts.app')

@section('title', 'Editar Reservas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/crear.css')}}">
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
     	Editar Reserva de: {{$cliente->nombre_completo}}</h1>

        <p>Aquí se Edita y Actualizan los datos de la Reserva</p>

        <p>Puedes cambiar la reserva que quieras y puedes evitar confusiones</p>

    <br>

     <form action="{{ route('actualizar-reserva', [$reserva, $cliente]) }}" method="POST">
    		@csrf
    		@method('PUT')

    		<div class="form-group">
    			<label for="fecha_visita">Fecha de la Visita</label>

    			<input type="date" name="fecha_visita" id="fecha_visita" value="{{old('fecha_visita', $reserva->fecha_visita)}}">

                @error('fecha_visita')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="hora_visita">Hora de la Visita</label>

    			<input type="time" name="hora_visita" id="hora_visita" value="{{old('hora_visita', $reserva->hora_visita)}}">

                @error('hora_visita')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="cantidad_personas">Cantidad de Personas que va a llevar</label>

    			<input type="integer" name="cantidad_personas" id="cantidad_personas" value="{{old('cantidad_personas', $reserva->cantidad_personas)}}" placeholder="Solo Números">

                @error('cantidad_personas')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="estado">Estado de la Mesa</label>

    			<select id="estado" name="estado" class="form-select" aria-label="Default select example">
    				<option value="">Seleccione un estado</option>
    				<option value="pendiente">Pendiente</option>
    				<option value="reservada">Reservada</option>
    				<option value="cancelada">Cancelada</option>
    			</select>

                @error('estado')
                <p>{{$message}}</p>
                @enderror

    		</div>

            <br>

            <div class="btn-container">
                <a href="{{ route('mostrar-reserva', [$reserva, $cliente]) }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

                <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
            </div>
    	</form>
    </div>
</div>
@endsection