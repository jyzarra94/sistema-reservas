@extends('layouts.app')

@section('title', 'Restaurante "La Redonda"')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css')}}">
<link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
@endsection

<style>
	body {
		background-image: url('{{ asset('images/Restaurante.jpg') }}');
        background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	}
</style>

@section('content')

<div class="container">
 <div class="content-box">
     <h1>!Bienvenido¡</h1>

     <br>

     <p>Éste es el Restaurante con la mejor calidad de platos exquisitos</p>

	 <p>Ésta es "La Redonda"</p>

     <a href="{{ route('vista') }}" class="btn btn-primary">ENTRAR</a>
 </div>
</div>
@endsection