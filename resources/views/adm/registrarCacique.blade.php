@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Procure revisar bien los datos antes de enviar el formulario.</b></div><br>
          <form class="" action="{{route('registrarCacique')}}" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nombre</label>
                <input required name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="John">
              </div>
              <div class="form-group col-md-6">
                <label>Apellido</label>
                <input required name="surname" value="{{old('surname')}}" type="text" class="form-control" placeholder="Appleseed">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>DNI</label>
                <input required name="dni" type="number" class="form-control" placeholder="Sin espacios ni puntos" value={{old('dni')}}>
              </div>

              <div class="form-group col-md-6">
                <label>Sexo</label>
                <select required name="gender" id="inputState" class="form-control">
                  <option value='' {{(old('gender') == NULL) ? 'selected' : ''}}>Seleccione un sexo</option>
                  <option value='M' {{(old('gender') == 'M') ? 'selected' : ''}}>Masculino</option>
                  <option value='F' {{(old('gender') == 'F') ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha de Nacimiento</label>
                <input required name="birthdate" value="{{old('birthdate')}}" type="date" class="form-control" placeholder="DD/MM/AAAA">
              </div>
              <div class="form-group col-md-6">
                <label>Dirección de Correo Electrónico</label>
                <input required name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="johnappleseed@sejuturdera.com.ar">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Dirección</label>
                <input required name="address" value="{{old('address')}}" type="text" class="form-control" placeholder="Suipacha 110">
              </div>
              <div class="form-group col-md-4">
                <label>Localidad</label>
                <input required name="city" value="{{old('city')}}" type="text" class="form-control" placeholder="Turdera">
              </div>
              <div class="form-group col-md-4">
                <label>Entrecalles (si aplica)</label>
                <input name="between_streets" value="{{old('between_streets')}}" type="text" class="form-control" placeholder="Zapiola y Padre Bruno">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Teléfono</label>
                <input name="phone" value="{{old('phone')}}" type="number" class="form-control" placeholder="Sin guiones ni espacios">
              </div>
              <div class="form-group col-md-6">
                <label>Celular</label>
                <input required name="cel" value="{{old('cel')}}" type="number" class="form-control" placeholder="Sin guiones ni espacios">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Escuela</label>
                <input required name="school" value="{{old('school')}}" type="text" class="form-control" placeholder="Instituto Santa Inés">
              </div>
              <div class="form-group col-md-6">
                <label>Año (Sólo numeros)</label>
                <input required name="grade" value="{{old('grade')}}" type="number" class="form-control" placeholder="5">
              </div>
            </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
