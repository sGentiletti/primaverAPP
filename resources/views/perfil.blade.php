@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Auth::user()->parent_id != NULL)
        Este usuario no es un Cacique, no debería estar aca 👊
        @else
        <div class="col-md-8 text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><b>Cacique</b></div>
                        <div class="card-body">
                            {{ Auth::user()->name }} {{ Auth::user()->surname }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><b>Información</b></div>
                        <div class="card-body d-flex justify-content-center">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">F</th>
                                        <th scope="col">M</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Nº de control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;
                                            @if ($dataTribu->cant_f >= $dataTribu->min_f && $dataTribu->cant_f <= $dataTribu->max_f)
                                            color: green;
                                            @else
                                            color: red;
                                            @endif
                                        ">{{ $dataTribu->cant_f }}</td>
                                        <td style="font-weight: bold;
                                            @if ($dataTribu->cant_m >= $dataTribu->min_m && $dataTribu->cant_m <= $dataTribu->max_m)
                                            color: green;
                                            @else
                                            color: red;
                                            @endif
                                        ">{{ $dataTribu->cant_m }}</td>
                                        <td style="font-weight: bold;
                                            @if ($dataTribu->total_indios >= $dataTribu->min_total && $dataTribu->total_indios <= $dataTribu->max_total)
                                            color: green;
                                            @else
                                            color: red;
                                            @endif
                                        ">{{ $dataTribu->total_indios }}</td>
                                        <td>
                                            @if($dataTribu->isTribuConfirmed->count())
                                            {{ $dataTribu->isTribuConfirmed[0]->num_tribu }}
                                            @elseif ($dataTribu->canConfirmTribu)
                                            <span style="color:green;">Puede preinscribirse</span>
                                            @else
                                            <span style="color:red;">No cumple los requisitos</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"><b>Indios</b></div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $n = 1;
                            @endphp
                            @foreach($indios as $indio)
                            <tr>
                                <th scope="row">{{ $n }}</th>
                                @php
                                $n++;
                                @endphp
                                <td>{{ $indio->name }}</td>
                                <td>{{ $indio->surname }}</td>
                                <td>{{ $indio->dni }}</td>
                                <td>
                                    @if(!$dataTribu->isTribuConfirmed->count())
                                    <a href="{{ route('detalleIndio', ['id' => $indio->id]) }}" class="btn btn-info"
                                        role="button active" aria-disabled="true">Ver /
                                        Editar</a>
                                    <a href="{{ route('eliminarIndioAction', ['id' => $indio->id]) }}"
                                        class="btn btn-danger active" role="button" aria-disabled="true">Eliminar</a>
                                    @else
                                    No disponible
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($indios->count() == 0)
                    <br>
                    <div class="alert alert-primary" role="alert">
                        Todavía no agregaste personas a tu tribu.<br>Apretá el boton "Agregar Persona" para comenzar a
                        crear tu lista.
                    </div>
                    @endif
                </div>
            </div>
            <br>
            @if(!$dataTribu->isTribuConfirmed->count())
            <a href="{{ route('agregar') }}" class="btn btn-primary">
                Agregar Persona
            </a>
            <br><br>
            @if($dataTribu->canConfirmTribu)
            @if(!$dataTribu->isTribuConfirmed->count())
            <a href="{{ route('confirmarAction') }}" class="btn btn-primary">
                Confirmar preinscripción
            </a>
            @else
            <p>Tribu preinscripta</p>
            @endif
            @endif
            @endif
        </div>
        @endif
    </div>
</div>
@endsection