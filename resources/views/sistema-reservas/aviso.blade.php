@extends('layouts.app')

@section('title', 'Aviso Previo para Eliminar el Cliente')

@section('styles')
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

.btn {
	display: block;
	padding: 0.75rem 1rem;
	background-color: #007BFF;
	color: white;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	margin-bottom: 1rem;
}

.btn-container {
	display: flex;
	justify-content: space-around;
	margin-bottom: 1rem;
}

</style>

@section('content')

<div class="container">
	<div class="content-box">
     <h1>
     	Eliminar al Cliente: {{$cliente->nombre_completo}}
     </h1>

     <br>

     <p>¿Estás seguro de que quieres eliminar a éste cliente?</p>

     <br>

     <div class="btn-container">

	 <a href="{{ route('mostrar', $cliente) }}" class="btn btn-primary">Cancelar</a>

     <form action="{{ route('eliminar', $cliente) }}" method="POST">

		@csrf
		@method('DELETE')

	  <button type="submit" class="btn btn-danger">Eliminar</button>
	 </form>

	</div>
  </div>
</div>
@endsection