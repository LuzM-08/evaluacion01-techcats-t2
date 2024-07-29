@extends('layouts.index')

@section('title')
    Obtener proyecto por ID
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Estado</th>
                <th scope="col">Responsable</th>
                <th scope="col">Costo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Proyecto X</td>
                <td>2024-03-01</td>
                <td>Finalizado</td>
                <td>Mozart</td>
                <td>$5.000.000</td>
            </tr>
        </tbody>
    </table>
@endsection
