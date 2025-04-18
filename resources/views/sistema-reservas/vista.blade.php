@extends('layouts.app')

@section('title', 'Vista Principal de Clientes')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/vista.css')}}">
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
     <h1>Listado de Clientes</h1>
     <p>Aquí se mostrarán a todos los clientes registrados</p>
     <p>Pulsa "Ver Cliente" para más información del cliente seleccionado</p>

     <div class="btn-container">
     <a href="{{ route('home')}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

     <a href="{{ route('crear') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear Nuevo Cliente</a>
     </div>

     <form action="{{ route('vista') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Buscar Clientes por Nombre y Apellido, Teléfono, Correo..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
            </div>
        </form>

        @if ($clientes->isEmpty())
            <div class="card-text text-muted mb-4">
                No se encontraron resultados para "{{ $search }}".
            </div>
        @endif

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
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
			<tr>
				<td>{{ $cliente->id }}</td>
				<td>{{ $cliente->nombre_completo }}</td>
				<td>{{ $cliente->telefono }}</td>
				<td>{{ $cliente->correo }}</td>
				<td>
					<a href="{{ route('mostrar', $cliente) }}" class="btn btn-primary"><i class="fas fa-user"></i> Ver Cliente</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    </div>

    <div class="d-flex justify-content-center">
    	{{ $clientes->links() }}
    </div>

   <br>

    <a href="{{ route('pdf') }}" target="_blank" class="btn btn-danger"><i class="far fa-file"></i> Exportar a PDF</a>

    <br>

    <a href="{{ route('contador') }}" class="btn btn-primary"><i class="far fa-smile"></i> Movimientos</a>

    </div>
</div>
@endsection