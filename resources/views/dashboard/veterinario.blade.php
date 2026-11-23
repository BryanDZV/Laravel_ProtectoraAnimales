@extends('layout.layout')
@section('content')
    <div class="container mt-4">
        <h1>Dashboard Veterinario</h1>
        <p>Bienvenido, {{ auth()->user()->name }}</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revisiones</h5>
                        <p class="card-text">Historial de revisiones médicas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection