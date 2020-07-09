@extends('layouts.app')

@section('content')
  <div class="container">
    @if ($indios->isEmpty() && $cacique->parent_id == NULL)
      <div class="row">
        <div class="alert alert-warning col-12 text-center" role="alert">
          No se encontraron indios inscriptos por esta persona. ¿Quizás aún no comenzó a inscribir gente?
        </div>
      </div>
    @endif

    @if ($cacique->parent_id != NULL)
      <div class="alert alert-danger col-12 text-center" role="alert">
        ERROR: Esta persona no es cacique. Es un indio y tiene designado como cacique a <a href="{{route('listadoTribus', ['id' => App\User::find($cacique->id)->cacique->id])}}">{{App\User::find($cacique->id)->cacique->name}} {{App\User::find($cacique->id)->cacique->surname}}</a>
      </div>
    @else

    <div class="row">
      <div class="col-sm-12 col-md-6 my-1">
        <div class="card text-center" style="height: 100%;">
          <div class="card-header">Cacique</div>
          <div class="card-body">
            <h3 class="font-weight-bolder">{{$cacique->name}} {{$cacique->surname}}</h3>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 my-1">
        <div class="card text-center">
          <div class="card-header">Información de la Tribu</div>
          <div class="card-body">
            <h3>Numero de control:
            <br>
            @if (isset($control->num_tribu))
              <span class="badge badge-success">{{$control->num_tribu}}</span> </h3>
            @else
              <span class="badge badge-danger">No disponible</span> </h3>
              <form method="post" action="{{route('confirmacionManual', ['id' => $cacique->id])}}">
                @csrf
                <button class="btn btn-warning" onclick="return confirm('¿Estás REQUETECONTRA SEGUR@ QUE LO QUERÉS HACER? Esta acción no se puede deshacer')" type="submit">Confirmar Manualmente</button>
              </form>
              <footer class="blockquote-footer"><cite title="Source Title">With great power comes great responsability.</cite></footer>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6 my-1">
        <div class="card text-center" style="height: 100%;">
          <div class="card-header">Masculinos</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Email Verificado</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $n = 1;
                @endphp
                @if ($cacique->gender == 'M')
                  <tr class="table-primary">
                    <th scope="row">{{$n}}</th>
                    @php
                      $n++;
                    @endphp
                    <td>{{$cacique->name}}</td>
                    <td>{{$cacique->surname}}</td>
                    <td><a href="/adminpanel/persona/{{$cacique->dni}}">{{$cacique->dni}}</a></td>
                    <td>
                      @if ($cacique->email_verified_at)
                          <h5>
                              <span class="badge badge-success">Verificado</span>
                          </h5>
                      @else
                          <h5>
                              <span class="badge badge-danger">Sin Verificar</span>
                          </h5>
                      @endif
                  </td>
                  </tr>
                @endif
                @foreach ($indios as $indio)
                  @if ($indio->gender == 'M')
                    <tr>
                      <th scope="row">{{$n}}</th>
                      @php
                        $n++;
                      @endphp
                      <td>{{$indio->name}}</td>
                      <td>{{$indio->surname}}</td>
                      <td><a href="/adminpanel/persona/{{$indio->dni}}">{{$indio->dni}}</a></td>
                      <td>
                        @if ($indio->email_verified_at)
                            <h5>
                                <span class="badge badge-success">Verificado</span>
                            </h5>
                        @else
                            <h5>
                                <span class="badge badge-danger">Sin Verificar</span>
                            </h5>
                        @endif
                    </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 my-1">
        <div class="card text-center" style="height: 100%;">
          <div class="card-header">Femeninos</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Email Verificado</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $n = 1;
                @endphp
                @if ($cacique->gender == 'F')
                  <tr class="table-primary">
                    <th scope="row">{{$n}}</th>
                    @php
                      $n++;
                    @endphp
                    <td>{{$cacique->name}}</td>
                    <td>{{$cacique->surname}}</td>
                    <td><a href="/adminpanel/persona/{{$cacique->dni}}">{{$cacique->dni}}</a></td>
                    <td>
                      @if ($cacique->email_verified_at)
                          <h5>
                              <span class="badge badge-success">Verificado</span>
                          </h5>
                      @else
                          <h5>
                              <span class="badge badge-danger">Sin Verificar</span>
                          </h5>
                      @endif
                  </td>
                  </tr>
                @endif
                @foreach ($indios as $indio)
                  @if ($indio->gender == 'F')
                    <tr>
                      <th scope="row">{{$n}}</th>
                      @php
                        $n++;
                      @endphp
                      <td>{{$indio->name}}</td>
                      <td>{{$indio->surname}}</td>
                      <td><a href="/adminpanel/persona/{{$indio->dni}}">{{$indio->dni}}</a></td>
                      <td>
                        @if ($indio->email_verified_at)
                            <h5>
                                <span class="badge badge-success">Verificado</span>
                            </h5>
                        @else
                            <h5>
                                <span class="badge badge-danger">Sin Verificar</span>
                            </h5>
                        @endif
                    </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
@endsection
