@extends('layouts.index')

@section('title')
    Todos los proyectos
@endsection

@section('content')
<div class="container mt-5">
  <h1>All Projects</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha de inicio</th>
              <th scope="col">Estado</th>
              <th scope="col">Owner</th>
              <th scope="col">Costo</th>
              <th scope="col">Creado por</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($projects as $project)
              <tr>
                  <th scope="row">{{ $project['id'] }}</th>
                  <td>{{ $project['nombre'] }}</td>
                  <td>{{ $project['fecha_inicio'] }}</td>
                  <td>{{ $project['estado'] }}</td>
                  <td>{{ $project['owner'] }}</td>
                  <td>{{ $project['costo'] }}</td>
                  <td>{{ $project['createdBy'] }}</td>
                  <form action="{{ url('/update-project/') }}" method="PUT">
                      @csrf
                      <td><button type="submit" class="btn btn-primary btn-sm">Actualizar</button></td>
                  </form>
                  <form action="{{ url('/delete-project/') }}" method="DELETE">
                      @csrf
                      <td><button type="submit" class="btn btn-danger btn-sm">Eliminar</button></td>
                  </form>
              </tr>
          @endforeach
      </tbody>
  </table>
  <form action="{{ url('/add-project/') }}" method="POST">
      @csrf
      <td><button type="submit" class="btn btn-info btn-sm">Agregar</button></td>
  </form>
</div>
@endsection