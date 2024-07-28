<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/imgs/craiyon_145524_wireframe_schematic_of_advanced_technology.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Technology solutions
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">All projects</a>
        </div>
      </div>
    </div>
  </nav>

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
              <th scope="col">Acciones</th>
          </tr>
      </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th scope="row">{{ $project['id'] }}</th>
                <td>{{ $project['nombre'] }}</td>
                <td>{{ $project['fecha_inicio'] }}</td>
                <td>{{ $project['estado'] }}</td>
                <td>{{ $project['owner'] }}</td>
                <td>{{ $project['costo'] }}</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
