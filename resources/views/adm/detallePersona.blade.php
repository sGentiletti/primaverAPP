@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          @if ($persona != NULL)
          <div class="card-header"><b>Procure revisar bien los datos antes de enviar el formulario.</b></div><br>
          <form class="" action="{{route('actualizarDni', ['id' => App\User::find($persona->id)])}}" method="post">
            @csrf
            @if ($flag ?? '')
              <div class="alert alert-success" role="alert">
                Datos actualizados correctamente. Última actualización: {{date("h:i:sa")}}
              </div>
            @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nombre</label>
                <input required name="name" value="{{$persona->name}}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="John">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Apellido</label>
                <input required name="surname" value="{{$persona->surname}}" type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="Appleseed">
                @error('surname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>DNI</label>
                <input required name="dni" type="number" class="form-control @error('dni') is-invalid @enderror" placeholder="12345678" value={{$persona->dni}}>
                @error('dni')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label>Sexo</label>
                <select required name="gender" id="inputState" class="form-control @error('gender') is-invalid @enderror">
                  @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                  <option value='' {{($persona->gender == NULL) ? 'selected' : ''}}>Seleccione un sexo</option>
                  <option value='M' {{($persona->gender == 'M') ? 'selected' : ''}}>Masculino</option>
                  <option value='F' {{($persona->gender == 'F') ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha de Nacimiento</label>
                <input required name="birthdate" value="{{$persona->birthdate}}" type="date" class="form-control @error('birthdate') is-invalid @enderror" placeholder="AAAA-DD-MM">
                @error('birthdate')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Dirección de Correo Electrónico</label>
                <input readonly="readonly" name="email" value="{{$persona->email}}" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="johnappleseed@sejuturdera.com.ar">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                  <input readonly="readonly" name="email_confirmation" value="{{$persona->email}}" type="hidden"
                      class="form-control @error('email') is-invalid @enderror"
                      placeholder="johnappleseed@sejuturdera.com.ar">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Dirección</label>
                <input required name="address" value="{{$persona->address}}" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Suipacha 110">
                @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label>Localidad</label>
                <input required name="city" value="{{$persona->city}}" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Turdera">
                @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label>Entrecalles (si aplica)</label>
                <input name="between_streets" value="{{$persona->between_streets}}" type="text" class="form-control @error('between_streets') is-invalid @enderror" placeholder="Zapiola y Padre Bruno">
                @error('between_streets')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Teléfono</label>
                <input name="phone" value="{{$persona->phone}}" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Sin guiones ni espacios">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Celular</label>
                <input required name="cel" value="{{$persona->cel}}" type="number" class="form-control @error('cel') is-invalid @enderror" placeholder="Sin guiones ni espacios">
                @error('cel')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Escuela</label>
                <input required name="school" value="{{$persona->school}}" type="text" class="form-control @error('school') is-invalid @enderror" placeholder="Instituto Santa Inés">
                @error('school')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Año (Sólo numeros)</label>
                <input required name="grade" value="{{$persona->grade}}" type="number" class="form-control @error('grade') is-invalid @enderror" placeholder="5">
                @error('grade')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
          @else
            <div class="alert alert-danger" role="alert">
              No se encontraron resultados para ese DNI.
            </div>
          @endif
        </div>
        <br>
        <br>
        <a class="btn btn-primary" href="{{route('adminPanel')}}">Volver al Panel de Administración</a>
      </div>
    </div>
  </div>
@endsection
