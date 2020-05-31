@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Panel de Administración</b></div>
          <div class="card-body">
            <h3>Consultas:</h3>
            <a class="btn btn-primary" href="{{route('listadoCaciques')}}">Ver Caciques</a>
            <br>
            <br>
            <form class="" action="{{route('buscarPersonaPorDni')}}" method="post">
              @csrf
              <input type="number" name="dni" value="" placeholder="Ingrese DNI">
              <button class="btn btn-primary" type="submit" name="button">Consultar DNI</button>
            </form>

            @if ($indio ?? '')
            @foreach ($indio as $indio)
              <form class="" action="{{route('detalleAction', ['id' => $indio ?? ''->id])}}" method="post">
                @csrf
                <input type="text" name="name" value="{{$indio->name}}" placeholder="Nombre"><br>
                <input type="text" name="surname" value="{{$indio->surname}}" placeholder="Apellido"><br>
                <input type="text" name="dni" value="{{$indio->dni}}" placeholder="DNI"><br>
                <input type="text" name="email" value="{{$indio->email}}" placeholder="Mail"><br>

                <button type="submit" class="btn btn-primary">
                    Modificar
                </button>
              </form>
            @endforeach
            @endif
          </div>
        </div>
        <br>

      </div>
    </div>
  </div>
@endsection
