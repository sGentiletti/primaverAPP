@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Agregar indio</b></div>
                <div class="card-body">
                    <div class="alert alert-light">
                        Acá tenés que ingresar los datos personales de la persona a la que vayas a agregar. Revisá bien los datos antes de enviar e formulario, en especial la dirección de correo electrónico ya que si necesitamos contactarnos con esta persona y nunca les llega nuestros correos, podría quedar eliminado y perjudicar la inscripción de tu tribu.
                    </div>
                    <form method="POST" action="{{route('agregarAction')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">Escuela*</label>

                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control @error('school') is-invalid @enderror"
                                    name="school" value="{{ old('school') }}" required autofocus>

                                @error('school')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Año*</label>

                            <div class="col-md-6">
                                <input id="grade" type="number" class="form-control @error('grade') is-invalid @enderror"
                                    name="grade" value="{{ old('grade') }}" required autofocus>

                                @error('grade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus autocomplete="off">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Apellido*</label>

                            <div class="col-md-6">
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autofocus autocomplete="off">

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">DNI*</label>

                            <div class="col-md-6">
                                <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror"
                                    name="dni" value="{{ old('dni') }}" required autofocus autocomplete="off">

                                @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Género*</label>

                            <div class="col-md-6 d-flex align-items-center">

                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="gender" id="genderF" value="F"
                                        @if (old('gender')==='F' ) checked @endif>
                                    <label class="form-check-label" for="genderF">
                                        F
                                    </label>
                                </div>

                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" name="gender" id="genderM" value="M"
                                        @if (old('gender')==='M' ) checked @endif>
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Repetir email*</label>

                            <div class="col-md-6">
                                <input id="email_confirmation" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email_confirmation" value="{{ old('email_confirmation') }}" required autocomplete="off">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento*</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" placeholder="AAAA-DD-MM" required autofocus autocomplete="off">

                                @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección*</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autofocus autocomplete="off">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-none">
                            <label for="between_streets" class="col-md-4 col-form-label text-md-right">Entrecalles*</label>

                            <div class="col-md-6">
                                <input id="between_streets" type="text" class="form-control @error('between_streets') is-invalid @enderror"
                                    name="between_streets" value="{{ old('between_streets') }}" autofocus autocomplete="off">

                                @error('between_streets')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Localidad*</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autofocus autocomplete="off">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono de Línea</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" autofocus autocomplete="off">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cel" class="col-md-4 col-form-label text-md-right">Celular*</label>

                            <div class="col-md-6">
                                <input id="cel" type="number" class="form-control @error('cel') is-invalid @enderror"
                                    name="cel" value="{{ old('cel') }}" required autofocus autocomplete="off">

                                @error('cel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#email_confirmation').on("cut copy paste",function(e) {
        e.preventDefault();
        });
    });
</script>
<script src="{{ asset('js/form.js')}}" type="text/javascript"></script>
@endsection


