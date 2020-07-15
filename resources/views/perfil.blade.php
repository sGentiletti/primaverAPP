@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::user()->is_admin == 1)
    <div class="alert alert-danger text-center" role="alert">
        Usted ingresó al sistema como <b>administrador</b> por lo cual no puede realizar acciones aquí. Necesita ser
        Indio.
        <br>
        <br>
        <a href="/adminpanel"><button type="button" class="btn btn-primary">Ir al panel de Administración</button></a>
    </div>
    @else
    <div class="row justify-content-center">
        @if(Auth::user()->parent_id != NULL)
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Bienvenid@ {{Auth::user()->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title">Tu cacique se está encargando de todo 🤩.</h5>
                    <p class="card-text">Mientras tanto podés chequear que tus datos sean correctos, en caso de haber
                        alguno erróneo <b>debés avisarle a tu cacique para que lo corrija.</b></p>
                </div>
            </div>
            <br>
            @if (\Carbon\Carbon::parse(Auth::user()->birthdate)->age >= 18)
            <div class="alert alert-info">
                <h4 class="alert-heading">Sos mayor de 18</h4>
                <p>Recordá que al ser mayor de 18 años debés presentar el <b>certificado de alumno regular</b> cuando te
                    lo indiquemos.</p>
            </div>
            @endif
            <div class="card">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <th>Apellido</th>
                            <td>{{Auth::user()->surname}}</td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                            <td>{{Auth::user()->dni}}</td>
                        </tr>
                        <tr>
                            <th>Sexo</th>
                            <td>{{(Auth::user()->gender == 'M') ? 'Masculino' : 'Femenino'}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{date("d-m-Y", strtotime(Auth::user()->birthdate))}}
                                <small class="text-muted">
                                    (dd-mm-aaaa)
                                </small>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th>Telefono</th>
                            <td>{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                            <th>Celular</th>
                            <td>{{Auth::user()->cel}}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{Auth::user()->address}}</td>
                        </tr>
                        <tr>
                            <th>Entrecalles</th>
                            <td>{{Auth::user()->between_streets}}</td>
                        </tr>
                        <tr>
                            <th>Localidad</th>
                            <td>{{Auth::user()->city}}</td>
                        </tr>
                        <tr>
                            <th>Escuela</th>
                            <td>{{Auth::user()->school}}</td>
                        </tr>
                        <tr>
                            <th>Año escolar</th>
                            <td>{{Auth::user()->grade}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        @else

        <div class="col-md-12 text-center">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header"><b>Cacique</b></div>
                        <div class="card-body">
                            <h3>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>                            
                        </div>
                        @if (\Carbon\Carbon::parse(Auth::user()->birthdate)->age >= 18)
                        <div class="alert alert-info" style="margin: 0;">
                            <h4 class="alert-heading">Sos mayor de 18</h4>
                            <p>Recordá que al ser mayor de 18 años debés presentar el <b>certificado de
                                    alumno regular</b> cuando te
                                lo indiquemos.</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header"><b>Información</b></div>
                        <div class="card-body table-responsive">
                            <div class="row mb-3">
                                <div class="col-12">
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
                                                        <h3>
                                                            <span class="badge badge-success">{{$dataTribu->isTribuConfirmed[0]->num_tribu}}</span>
                                                        </h3>
                                                    
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
                            
                            <div class="row">
                                <div class="col-sm-12">
                                        <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Requisitos
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Requisitos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body text-left">
                                            Para que el boton "Confirmar Preinscripción" aparezca, debés cumplir con los siguientes requisitos:
                                            <br>
                                            <ul>
                                                <li>Edades:</li>
                                                <ul>
                                                    <li>Todos los participantes deben estar entre 2do y 7mo año de la escuela secundaria.</li>
                                                </ul>
                                                <li>Cantidades:</li>
                                                <ul>
                                                    <li>Cantidad mínima de personas: 12.</li>
                                                    <li>Cantidad máxima de personas: 16.</li>
                                                </ul>
                                                <li>Sexos</li>
                                                <ul>
                                                    <li>Como mínimo 6 personas de sexo femenino.</li>
                                                    <li>Como mínimo 6 personas de sexo masculino.</li>
                                                </ul>
                                                <li>Datos:</li>
                                                <ul>
                                                    <li>Verificá que los datos sean reales y no estén mal escritos, en especial las direcciones de correo electrónico, de lo contrario podrías quedar eliminado.</li>
                                                    <li>Todas las direcciones de correo electrónico deben estar <span class="badge badge-success">Verificadas</span>.</li>
                                                </ul>
                                            </ul>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><b>Indios</b></div>
                <div class="card-body table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col" data-toggle="tooltip" title="Indica si el usuario ha verificado su dirección de correo electrónico." class="d-flex justify-content-center align-items-center">
                                    Email<ion-icon name="information-circle-sharp" size="small"> </ion-icon>
                                </th>
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
                                    @if ($indio->email_verified_at)
                                        <h5>
                                            <span class="badge badge-success">Verificado</span>
                                        </h5>
                                    @else
                                        <h5>
                                            <span class="badge badge-danger">Sin Verificar</span>
                                        </h5>
                                    @endif
                                </td>
                                <td>
                                    @if(!$dataTribu->isTribuConfirmed->count())
                                    <a href="{{ route('detalleIndio', ['id' => $indio->id]) }}" class="btn btn-info"
                                        role="button active" aria-disabled="true">Ver /
                                        Editar</a>
                                    <a onclick="return confirm('¿Estás seguro? Esta acción no se puede deshacer')" href="{{ route('eliminarIndioAction', ['id' => $indio->id]) }}"
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
                        <h4 class="alert-heading">Parece que no hay nadie...</h4>
                        Una tribu necesita indios... a no ser que quieras estar como Milhouse.<br>¡Comenzá agregando
                        personas!
                        <hr><img loading="lazy" src="https://media.giphy.com/media/VfyC5j7sR4cso/giphy.gif">
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
            <a onclick="return confirm('¿Estás segur@? Una vez preinscripto no podrás editar ni agregar personas.')" href="{{ route('confirmarAction') }}" class="btn btn-success">
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
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
