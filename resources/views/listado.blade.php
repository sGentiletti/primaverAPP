@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="card">
          <div class="card-header"><b>Cacique</b></div>
          <ul>
            @foreach ($caciques as $cacique)
              <li>{{$cacique->name}}</li>
            @endforeach
          </ul>

        </div>
      </div>
    </div>
  </div>
@endsection
