@extends('layouts.app')

@section('title', 'Editar Datos del Cliente')

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
    <h1>Actualizar Datos de: {{$cliente->nombre_completo}}</h1>

    <br>

    <p>Aquí se puede editar y actualizar los datos del cliente seleccionado</p>

    <p>Puedes cambiar algunos de estos campos como prefieras</p>

    <br>

     <form action="{{ route('actualizar', $cliente) }}" method="POST">
    		@csrf
            @method('PUT')

    		<div class="form-group">
    			<label for="nombre_completo">Nombre y Apellido</label>

    			<input type="text" name="nombre_completo" id="nombre_completo" value="{{old('nombre_completo', $cliente->nombre_completo)}}" placeholder="Nombre y Apellido">

                 @error('nombre_completo')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="telefono">Número de Teléfono</label>

    			<input type="text" name="telefono" id="telefono" value="{{old('telefono', $cliente->telefono)}}" placeholder="Número de Teléfono Actual">

                 @error('telefono')
                <p>{{$message}}</p>
                @enderror

    		</div>
    		<div class="form-group">
    			<label for="correo">Correo Electrónico</label>

    			<input type="email" name="correo" id="correo" value="{{old('correo', $cliente->correo)}}" placeholder="Correo">

                 @error('correo')
                <p>{{$message}}</p>
                @enderror

    		</div>

            <br>

            <div class="btn-container">
                <a href="{{ route('mostrar', $cliente) }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </div>
    	</form>
    </div>
</div>
@endsection