@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <br>
      <div class="card">
        <div class="card-header"><b>Detalles de Indio</b></div>
        <div class="card-body">
          @if ($indio != NULL)
          @if ($flag ?? '' === 1)
          <div class="alert alert-success" role="alert">
            Los datos se modificaron correctamente.
          </div>
          @endif

          <form class="" action="{{route('detalleAction', ['id' => $indio->id])}}" method="post">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{$indio->name}}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

              <div class="col-md-6">
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                  name="surname" value="{{$indio->surname}}" required autocomplete="surname" autofocus>

                @error('surname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

              <div class="col-md-6">
                <input id="dni" type="tel" class="form-control @error('dni') is-invalid @enderror" name="dni"
                  value="{{$indio->dni}}" required autocomplete="dni" autofocus>

                @error('dni')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="gender" class="col-md-4 col-form-label text-md-right">Género</label>

              <div class="col-md-6 d-flex align-items-center">

                <div class="form-check mr-3">
                  <input class="form-check-input" type="radio" name="gender" id="genderF" value="F" @if ($indio->gender
                  === 'F') checked @endif>
                  <label class="form-check-label" for="genderF">
                    F
                  </label>
                </div>

                <div class="form-check ml-3">
                  <input class="form-check-input" type="radio" name="gender" id="genderM" value="M" @if ($indio->gender
                  === 'M') checked @endif>
                  <label class="form-check-label" for="genderM">
                    M
                  </label>
                </div>

                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{$indio->email}}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Modificar
                </button>
              </div>
            </div>
            @else
            <div class="alert alert-danger" role="alert">
              Error! No se ha encontrado a esa persona o no tenés permisos suficientes para ver su información. Si crees
              que
              se trata de un error <a href="#">contactanos</a>.
            </div>
            @endif
        </div>
      </div>
      <br>
      <div class="text-center">
        <a href="{{ route('perfil') }}" class="btn btn-primary">
          Volver atrás
        </a>
      </div>
    </div>
  </div>
</div>
@endsection