@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col-sm-12 col-md-6 my-2">
        <div class="card text-center" style="height: 100%;">
          <div class="card-header">Agregar</div>
          <div class="card-body">
            <a id="nuevoCacique" class="btn btn-info" href="{{route('registrarCaciqueForm')}}">Nuevo Cacique</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 my-2">
          <div class="card text-center">
            <div class="card-header">Buscar</div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <form class="" action="{{route('buscarPersonaPorDni', ['dni'])}}" method="get">
                    @csrf
                    <div class="input-group mb-3">
                      <input name="dni" type="number" class="form-control" placeholder="Buscar por DNI">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Consultar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <form class="" action="{{route('buscarPorControl', ['control'])}}" method="get">
                    @csrf
                    <div class="input-group mb-3">
                      <input name="control" type="text" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder="Buscar por Control">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Consultar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="card">
          <div class="card-header"><b>Estadísticas de la SeJu</b></div>
          <div class="card-body d-flex justify-content-center">
            <div class="row">
              <div class="col-sm-12 col-md-12 table-responsive">
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
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="card">
          <div class="card-header"><b>Caciques</b></div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Nº Control</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $n = 1;
                @endphp
                @foreach ($caciques as $cacique)
                @php
                  $foo = App\Tribu::where("user_id", $cacique->id)->first(); //Busca en el modelo de Tribu la fila con la columna "user_id" = $cacique->id. Si no encuentra nada, devuelve nulo, significando que el cacique no confirmo su tribu.
                @endphp
                  <tr
                  @if ($foo != NULL)
                    class="table-success"
                  @endif
                  >
                    <th scope="row">{{$n}}</th>
                    @php
                      $n++;
                    @endphp
                    <td>{{$cacique->name}}</td>
                    <td>{{$cacique->surname}}</td>
                    <td><a href="/adminpanel/persona/{{$cacique->dni}}">{{$cacique->dni}}</a></td>
                    @if ($foo['num_tribu'])
                      <td> 
                        <h4>
                          <span class='badge badge-success'>{{$foo['num_tribu']}}</span>
                        </h4>                         
                      </td>
                    @else
                      <td>                        
                          <span>No disponible</span>                      
                      </td>
                    @endif
                    <td>
                        <a class="btn btn-outline-info" href="{{route('listadoTribus', ['id' => $cacique->id])}}">Explorar</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @if ($caciques->isEmpty())
            <div class="alert alert-danger" role="alert">
              No hay caciques registrados en el sistema. ¿Primera vez? Hacé click en "Nuevo Cacique".
            </div>
          @endif
        </div>
    </div>
  </div>
@endsection
