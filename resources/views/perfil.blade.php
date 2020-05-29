@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Cacique</b></div>
          <div class="card-body">
            {{ Auth::user()->name }}
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-header"><b>Indios</b></div>
          <div class="card-body">
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
                @foreach ($indios as $indio)
                  <tr>
                    <th scope="row">{{$n}}</th>
                    @php
                      $n++;
                    @endphp
                    <td>{{$indio->name}}</td>
                    <td>{{$indio->surname}}</td>
                    <td>{{$indio->dni}}</td>
                    <td>
                      <button type="button" name="button">
                        <a href="{{route('detalleIndio', ['id' => $indio->id])}}">Ver</a>
                      </button>
                      <button type="button" name="button">Eliminar</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @if ($indios->count() == 0)
              <div class="alert alert-primary" role="alert">
                Todavía no agregaste personas a tu tribu. Apretá el boton "Agregar Persona" para comenzar a crear tu lista.
              </div>
            @endif
          </div>
        </div>
        <br><br><br>
        <a href="{{ route('agregar') }}" class="btn btn-primary">
          Agregar indio
        </a>
      </div>
    </div>
  </div>
@endsection
