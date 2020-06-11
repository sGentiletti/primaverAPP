@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Panel de Administración</b></div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <a class="btn btn-primary" href="{{route('registrarCaciqueForm')}}">Nuevo Cacique</a>
              </div>
              <div class="col">
                <form class="" action="{{route('buscarPersonaPorDni', ['dni'])}}" method="get">
                  @csrf
                  <div class="input-group mb-3">
                    <input name="dni" type="number" class="form-control" placeholder="Buscar por DNI">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Consultar DNI</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-header"><b>Estadísticas de la SeJu</b></div>
          <div class="card-body d-flex justify-content-center">
            <div class="row">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Indios</th>
                    <th scope="col">Caciques/Tribus</th>
                    <th scope="col">Tribus Confirmadas</th>
                    <th scope="col">Tribus sin confirmar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$datos['total']}}</td>
                    <td>{{$datos['totalCaciques']}}</td>
                    <td>{{$datos['totalConfirmadas']}}</td>
                    <td>{{($datos['totalCaciques'] - $datos['totalConfirmadas'])}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-header"><b>Caciques</b></div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
              @php
                $n = 1;
              @endphp
              @foreach ($caciques as $cacique)
                <tr
                  @php
                    $foo = App\Tribu::where("user_id", $cacique->id)->first(); //Busca en el modelo de Tribu la fila con la columna "user_id" = $cacique->id. Si no encuentra nada, devuelve nulo, significando que el cacique no confirmo su tribu.
                    if ($foo != NULL) {
                      echo "class='table-success'";
                    }
                  @endphp
                >
                  <th scope="row">{{$n}}</th>
                  @php
                    $n++;
                  @endphp
                  <td>{{$cacique->name}}</td>
                  <td>{{$cacique->surname}}</td>
                  <td><a href="/adminpanel/persona/{{$cacique->dni}}">{{$cacique->dni}}</a></td>
                  <td>
                    <button type="button" name="button">
                      <a href="{{route('listadoTribus', ['id' => $cacique->id])}}">Explorar</a>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          @if ($caciques->isEmpty())
            <div class="alert alert-danger" role="alert">
              No hay caciques registrados en el sistema. ¿Primera vez? Hacé click en "Nuevo Cacique".
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
