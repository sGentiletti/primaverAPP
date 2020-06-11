@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Procure revisar bien los datos antes de enviar el formulario.</b></div><br>
          <form class="" action="{{route('registrarCacique')}}" method="post">
            @csrf
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">Información</h4>
              <p>Este formulario es para dar de alta a un Cacique en la plataforma. Una vez agregado, podrá ingresar con su Usuario (email) y Contraseña (Numero de documento sin espacios ni puntos.)</p>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nombre</label>
                <input required name="name" value="{{old('name')}}" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="John">

                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Apellido</label>
                <input required name="surname" value="{{old('surname')}}" type="text" class="form-control  @error('surname') is-invalid @enderror" placeholder="Appleseed">

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
                <input required name="dni" type="number" class="form-control  @error('dni') is-invalid @enderror" placeholder="Sin espacios ni puntos" value={{old('dni')}}>

                @error('dni')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label>Sexo</label>
                <select required name="gender" id="inputState" class="form-control  @error('gender') is-invalid @enderror">
                  @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <option value='' {{(old('gender') == NULL) ? 'selected' : ''}}>Seleccione un sexo</option>
                  <option value='M' {{(old('gender') == 'M') ? 'selected' : ''}}>Masculino</option>
                  <option value='F' {{(old('gender') == 'F') ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha de Nacimiento</label>
                <input required name="birthdate" value="{{old('birthdate')}}" type="date" class="form-control @error('birthdate') is-invalid @enderror" placeholder="DD/MM/AAAA">
                @error('birthdate')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Dirección de Correo Electrónico</label>
                <input required name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="johnappleseed@sejuturdera.com.ar">
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
                <input required name="address" value="{{old('address')}}" type="text" class="form-control  @error('address') is-invalid @enderror" placeholder="Suipacha 110">
                @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label>Localidad</label>
                <input required name="city" value="{{old('city')}}" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Turdera">
                @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label>Entrecalles (si aplica)</label>
                <input name="between_streets" value="{{old('between_streets')}}" type="text" class="form-control  @error('between_streets') is-invalid @enderror" placeholder="Zapiola y Padre Bruno">
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
                <input name="phone" value="{{old('phone')}}" type="number" class="form-control  @error('phone') is-invalid @enderror" placeholder="Sin guiones ni espacios">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Celular</label>
                <input required name="cel" value="{{old('cel')}}" type="number" class="form-control @error('cel') is-invalid @enderror" placeholder="Sin guiones ni espacios">
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
                <input required name="school" value="{{old('school')}}" type="text" class="form-control  @error('school') is-invalid @enderror" placeholder="Instituto Santa Inés">
                @error('school')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Año (Sólo numeros)</label>
                <input required name="grade" value="{{old('grade')}}" type="number" class="form-control  @error('grade') is-invalid @enderror" placeholder="5">
                @error('grade')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
              <button type="submit" class="btn btn-primary">Registrar Cacique</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
