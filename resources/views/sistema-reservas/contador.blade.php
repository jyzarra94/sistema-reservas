@extends('layouts.app')

@section('title', 'Movimientos del Sistema')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contador.css')}}">
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
		<h1>Movimientos que han realizado los clientes</h1>
		<p>Aquí se muestran todos los movimientos del sistema como tal.</p>
		<div class="counter-container justify-content-center">
		<div class="row">
			<div class="col-md-4 mb-4">
				<div class="card">
					<div class="card-body text-center">
						<h5 class="card-title">Total de Clientes registrados</h5>
						<p class="card-text">{{ $totalClientes }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card">
					<div class="card-body text-center">
						<h5 class="card-title">Clientes sin registrar Reservas</h5>
						<p class="card-text">{{ $clientesSinReservas }}</p>
					</div>
				</div>
			</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">Total de Reservas Registradas</h5>
							<p class="card-text">{{ $totalReservas }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">Reservas Pendientes</h5>
							<p class="card-text">{{ $reservasPendientes }}</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">Reservas Solicitadas</h5>
							<p class="card-text">{{ $reservasSolicitadas }}</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">Reservas Canceladas</h5>
							<p class="card-text">{{ $reservasCanceladas }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

        <a href="{{ route('vista' )}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Volver</a>

	</div>
</div>
@endsection