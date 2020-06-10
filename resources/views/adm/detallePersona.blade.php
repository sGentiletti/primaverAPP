@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          @if ($persona != NULL)
          <div class="card-header"><b>Procure revisar bien los datos antes de enviar el formulario.</b></div><br>
          <form class="" action="{{route('actualizarDni')}}" method="post">
            @csrf
            @if ($flag ?? '')
              <div class="alert alert-success" role="alert">
                Datos actualizados correctamente. Última actualización: {{date("h:i:sa")}}
              </div>
            @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nombre</label>
                <input required name="name" value="{{$persona->name}}" type="text" class="form-control" placeholder="John">
              </div>
              <div class="form-group col-md-6">
                <label>Apellido</label>
                <input required name="surname" value="{{$persona->surname}}" type="text" class="form-control" placeholder="Appleseed">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>DNI</label>
                <input required name="dni" type="number" class="form-control" placeholder="12345678" value={{$persona->dni}}>
              </div>

              <div class="form-group col-md-6">
                <label>Sexo</label>
                <select required name="gender" id="inputState" class="form-control">
                  <option value='' {{($persona->gender == NULL) ? 'selected' : ''}}>Seleccione un sexo</option>
                  <option value='M' {{($persona->gender == 'M') ? 'selected' : ''}}>Masculino</option>
                  <option value='F' {{($persona->gender == 'F') ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Fecha de Nacimiento</label>
                <input required name="birthdate" value="{{$persona->birthdate}}" type="date" class="form-control" placeholder="DD/MM/AAAA">
              </div>
              <div class="form-group col-md-6">
                <label>Dirección de Correo Electrónico</label>
                <input required name="email" value="{{$persona->email}}" type="email" class="form-control" placeholder="johnappleseed@sejuturdera.com.ar">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Dirección</label>
                <input required name="address" value="{{$persona->address}}" type="text" class="form-control" placeholder="Suipacha 110">
              </div>
              <div class="form-group col-md-4">
                <label>Localidad</label>
                <input required name="city" value="{{$persona->city}}" type="text" class="form-control" placeholder="Turdera">
              </div>
              <div class="form-group col-md-4">
                <label>Entrecalles (si aplica)</label>
                <input name="between_streets" value="{{$persona->between_streets}}" type="text" class="form-control" placeholder="Zapiola y Padre Bruno">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Teléfono</label>
                <input name="phone" value="{{$persona->phone}}" type="number" class="form-control" placeholder="Sin guiones ni espacios">
              </div>
              <div class="form-group col-md-6">
                <label>Celular</label>
                <input required name="cel" value="{{$persona->cel}}" type="number" class="form-control" placeholder="Sin guiones ni espacios">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Escuela</label>
                <input required name="school" value="{{$persona->school}}" type="text" class="form-control" placeholder="Instituto Santa Inés">
              </div>
              <div class="form-group col-md-6">
                <label>Año (Sólo numeros)</label>
                <input required name="grade" value="{{$persona->grade}}" type="number" class="form-control" placeholder="5">
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