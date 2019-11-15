@extends('layouts.master')

@section('title')
  Inicio
@endsection

@section('content')
  <br><br>
    @if(count($eventos) > 0)
      <div class="row">
        @foreach($eventos as $evento)
          <div class="col-4 event-card">
            <div class="row">
              <div class="col-9">
                <h4>{{$evento->nombre}}</h4>
              </div>
              <div class="col-3">
                <button class="btn btn-primary" type="button" name="button">¡Asistir!</button>
              </div>
            </div>
            <p>{{$evento->fechaInicio}}</p>
            <h6>{{$evento->lugar}}</h6>
            <p>${{$evento->costo}}</p>
            <p>{{$evento->descripcion}}</p>
          </div>
        @endforeach
      </div>
    @else
      <h2 class="text-center">No hay eventos próximamente, checa más tarde</h2>
    @endif


@endsection
