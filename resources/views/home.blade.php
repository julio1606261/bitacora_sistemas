@extends('layout.nav')
@section('title', 'Home')
@section('content')

<div class="card" style="width: 18rem;">
    <a href="{{route('bitacora')}}" style="text-decoration: none; color: black;">
        <img src="{{asset('images/icon_bitacora.png')}}" class="card-img-top" alt="icono bitacora">
        <div class="card-body">
        <h5 class="card-title">Bitácora</h5>
        <p class="card-text">Registra los eventos que suceden diariamente para generar los indicadores correspondientes.</p>
        </div>
    </a>
</div>

@endsection