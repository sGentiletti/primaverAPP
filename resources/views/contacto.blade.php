@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            @if (isset($flag))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Roger that!</h4>
                <p>Recibimos tu mensaje 💌 Nuestros ingenieros se pondrán a descifrar lo que intentaste comunicarnos,
                    luego se contactarán con vos para resolver tu duda 😎</p>
                <hr>
                <p class="mb-0">Te regalamos una galletita por tu tiempo 🍪</p>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h1>Contacto</h1>
                </div>
                <div class="card-body">
                    <form action="/contacto" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-8 col-md-6 mb-3">
                                <label for="">Nombre:</label>
                                <input readonly="readonly" name="name" type="text" class="form-control"
                                    value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-sm-8 col-md-6 mb-3">
                                <label for="">Correo Electrónico:</label>
                                <input readonly="readonly" name="email" type="text" class="form-control"
                                    value="{{Auth::User()->email}}">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="">Su mensaje:</label>
                                <textarea name="mensaje" required type="text" rows="3" class="form-control"
                                    value="{{old('mensaje')}}"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
