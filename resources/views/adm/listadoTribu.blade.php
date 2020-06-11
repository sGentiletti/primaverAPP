@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Cacique: {{$cacique->name}} {{$cacique->surname}}</b></div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
              </tr>
            </thead>
            @if ($indios->isEmpty() && $cacique->parent_id == NULL)
              <div class="alert alert-primary" role="alert">
                No se encontraron indios inscriptos por esta persona. ¿Quizás aún no comenzó a inscribir gente?
              </div>
            @endif
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
                  <td><a href="/adminpanel/persona/{{$indio->dni}}">{{$indio->dni}}</a></td>
                </tr>
              @endforeach
            </tbody>
            @if ($cacique->parent_id != NULL)
              <div class="alert alert-danger" role="alert">
                ERROR: Esta persona no es cacique. Es un indio y tiene designado como cacique a <a href="{{route('listadoTribus', ['id' => App\User::find($cacique->id)->cacique->id])}}">{{App\User::find($cacique->id)->cacique->name}} {{App\User::find($cacique->id)->cacique->surname}}</a>
              </div>
            @endif
          </table>
        </div>
        <br>
        <a class="btn btn-primary" href="{{route('adminPanel')}}">Volver Atrás</a>
      </div>
    </div>
  </div>
@endsection
