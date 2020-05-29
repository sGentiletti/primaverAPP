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
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <br><br><br>
        <a href="{{ route('agregar') }}" class="btn btn-primary">
          Agregar indio
        </a>
        <br><br><br>
        <a href="{{ route('confirmarAction') }}" class="btn btn-primary">
          Confirmar preinscripción
        </a>
      </div>
    </div>
  </div>
@endsection
