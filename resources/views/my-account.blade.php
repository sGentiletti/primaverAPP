@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card">
                <div class="card-header"><b>Cacique</b></div>
                <div class="card-body">
                   {{ Auth::user()->name }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"><b>Indios</b></div>
                <div class="card-body">

                </div>
            </div>
            <br><br><br>
            <a href="{{ route('create-indian') }}" class="btn btn-primary">
               Agregar indio
            </a>
        </div>
    </div>
</div>
@endsection
