@extends('layouts.master')

@section('title')
  Inicio
@endsection

@section('content')
  <br><br>
    @if(count($eventos) > 0)
      <div class="row">
        @foreach($eventos as $evento)
         <?php $asistentes = \App\Http\Controllers\DashboardController::getAttendees($evento->idEvento)  ?>
          <div class="col-4 event-card">
            <div class="row">
              <div class="col-8">
                <h4>{{$evento->nombre}}</h4>
              </div>
              @if($asistentes<$evento->maxAsistentes)
                <?php $asisto = false ?>
                @foreach($misboletos as $boleto)
                  @if($boleto->idEvento == $evento->idEvento)
                    <?php $asisto = true ?>
                    @break
                  @endif
                @endforeach
                @if($asisto == false)
                  <div class="col-4">
                    <form action="{{ route('registrarme') }}" method="post">
                      <button type="submit" class="btn btn-primary col-12" name="button">¡Asistir!</button>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                      <input type="hidden" name="idEvento" value="{{$evento->idEvento}}">
                      <input type="hidden" name="idUsuario" value="{{ Auth::id() }}">
                    </form>
                  </div>
                @else
                  <div class="col-4">
                    <h6 class="text-success">¡Asistirás!</h6>
                  </div>
                @endif
              @else
                <div class="col-4">
                  <h6 class="text-danger">¡Agotado!</h6>
                </div>
              @endif
            </div>
            <p>{{$evento->fechaInicio}}</p>
            <h6>{{$evento->lugar}}</h6>
            <p>${{$evento->costo}}</p>
            <p>{{$evento->descripcion}}</p>
            @if(Auth::user()->idRol === 1)
              <form action="{{ route('asistentes') }}" method="post" class="row">
                <button type="submit" class="btn btn-secondary col-12 grey" name="button">Asistentes</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="idEvento" value="{{$evento->idEvento}}">
                <input type="hidden" name="siglas" value="{{$evento->siglas}}">
                <input type="hidden" name="nombre" value="{{$evento->nombre}}">
              </form>
            @endif
          </div>
        @endforeach
      </div>
    @else
      <h2 class="text-center">No hay eventos próximamente, checa más tarde</h2>
    @endif


@endsection
