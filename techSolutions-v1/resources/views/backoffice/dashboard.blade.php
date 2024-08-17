@extends('layouts.app')

@section('title', 'Titulo de la pagina')

@section('page-title', 'Dashboard')

@section('nombreUsuario', $nombreUsuario)

@section('css')
<!-- Custom css -->
    
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    Datos del usuario
                </div>
                <div class="card-body">
                    <p>Nombre: {{$user->nombre}}</p>
                    <p>Email: {{$user->email}}</p>
                </div>
                <div class="card-footer">
                    Pie de la tarjeta
                </div>
            </div>
        </div>
    </div>
    <form action="{{ Route('usuario.logout') }}" method="POST">
        @csrf
        <button class="btn btn-warning" type="submit">Cerrar sesión</button>
    </form>
    
</div>
    
@endsection