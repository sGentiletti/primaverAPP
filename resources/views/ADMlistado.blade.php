@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
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
                <tr>
                  <th scope="row">{{$n}}</th>
                  @php
                    $n++;
                  @endphp
                  <td>{{$cacique->name}}</td>
                  <td>{{$cacique->surname}}</td>
                  <td>{{$cacique->dni}}</td>
                  <td>
                    <button type="button" name="button">
                      <a href="{{route('listadoTribus', ['id' => $cacique->id])}}">Ver Tribu</a>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
