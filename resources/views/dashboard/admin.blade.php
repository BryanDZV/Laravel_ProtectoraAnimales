@extends('layout.layout')
@section('content')
    <div class="container mt-4">
        <h1>Dashboard Administrador</h1>
        <p>Bienvenido, {{ auth()->user()->name }}</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Animales</h5>
                        <p class="card-text">Gestiona los animales del refugio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection