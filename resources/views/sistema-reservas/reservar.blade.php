@extends('layouts.app')

@section('title', 'Crear reserva')

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
     <h1>Crear Reserva para: {{$cliente->nombre_completo}}</h1>

     <p>Aquí se va a crear y asignar la reserva para el cliente seleccionado</p>

     <p>Asigna una nueva reserva y disfruta de nuestro servicio</p>

     <br>

     <form action="{{ route('reservado', $cliente) }}" method="POST">
    		@csrf
    		<div class="form-group">
    			<label for="fecha_visita">Fecha de la Visita</label>

    			<input type="date" name="fecha_visita" id="fecha_visita" value="{{old('fecha_visita')}}">

                @error('fecha_visita')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="hora_visita">Hora de la Visita</label>

    			<input type="time" name="hora_visita" id="hora_visita" value="{{old('hora_visita')}}">

                @error('hora_visita')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="cantidad_personas">Cantidad de Personas que va a llevar</label>

    			<input type="integer" name="cantidad_personas" id="cantidad_personas" value="{{old('cantidad_personas')}}" placeholder="Solo Números">

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
                <a href="{{ route('reserva', $cliente) }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

                <button type="submit" class="btn btn-primary">Crear Reserva</button>
            </div>
    	</form>
    </div>
</div>
@endsection