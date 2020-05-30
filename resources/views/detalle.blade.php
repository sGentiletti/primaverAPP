@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <br>
        <div class="card">
          <div class="card-header"><b>Detalles de Indio</b></div>
          @if ($flag ?? '' === 1)
            <div class="alert alert-success" role="alert">
              Los datos se modificaron correctamente.
            </div>
          @endif
          @if ($indio != NULL)
            <div class="card-body">

              <form class="" action="{{route('detalleAction', ['id' => $indio->id])}}" method="post">
                @csrf
                <input type="text" name="name" value="{{$indio->name}}" placeholder="Nombre"><br>
                <input type="text" name="surname" value="{{$indio->surname}}" placeholder="Apellido"><br>
                <input type="text" name="dni" value="{{$indio->dni}}" placeholder="DNI"><br>
                <input type="text" name="email" value="{{$indio->email}}" placeholder="Mail"><br>

                <button type="submit" class="btn btn-primary">
                    Modificar
                </button>
              </form>

            </div>
            @else
              <div class="alert alert-danger" role="alert">
                Error! No se ha encontrado a esa persona o no tenés permisos suficientes para ver su información. Si crees que se trata de un error <a href="#">contactanos</a>.
              </div>
          @endif

        </div>
        <br>
          <a href="{{ route('perfil') }}" class="btn btn-primary">
            Volver atrás
          </a>
      </div>
    </div>
  </div>
@endsection
