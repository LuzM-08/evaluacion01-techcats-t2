@extends('layouts.app')

@section('title', 'Titulo de la pagina')

@section('page-title', 'Dashboard')

@section('css')
<!-- Custom css -->
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    Encabezado
                </div>
                <div class="card-body">
                    Cuerpo de la tarjeta
                </div>
                <div class="card-footer">
                    Pie de la tarjetas
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection