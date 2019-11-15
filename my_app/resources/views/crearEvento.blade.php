@extends('layouts.master')

@section('title')
  Crear evento
@endsection

@section('content')
  <br><br>
  @if(count($errors) > 0)
    <div class="row">
      <div class="col-md-6">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <br>
  @endif
  <div class="row">
    <div class="col-6">
      <h2>Nuevo Evento</h3>
      <br>
      <form action="{{ route('crearEvento') }}" method="post">
        <div class="row">
          <div class="form-group col-9">
            <label for="nombre">Nombre</label>
            <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ Request::old('nombre') }}" required>
          </div>
          <div class="form-group col-3">
            <label for="siglas">Siglas</label>
            <input class="form-control {{ $errors->has('siglas') ? 'is-invalid' : '' }}" type="text" pattern="[A-Za-z]{3}" name="siglas" id="siglas" value="{{ Request::old('siglas') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ Request::old('descripcion') }}" rows="3" required></textarea>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="maxAsistentes">Lím. Asistentes</label>
            <input class="form-control {{ $errors->has('maxAsistentes') ? 'is-invalid' : '' }}" type="number" name="maxAsistentes" id="maxAsistentes" value="{{ Request::old('maxAsistentes') }}" required>
          </div>
          <div class="form-group col-6">
            <label for="costo">Costo</label>
            <input class="form-control {{ $errors->has('costo') ? 'is-invalid' : '' }}" type="number" name="costo" id="costo" value="{{ Request::old('costo') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="lugar">Lugar</label>
          <input class="form-control {{ $errors->has('lugar') ? 'is-invalid' : '' }}" type="text" name="lugar" id="lugar" value="{{ Request::old('lugar') }}" required>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="fechaInicio">Inicio</label>
            <input class="form-control {{ $errors->has('fechaInicio') ? 'is-invalid' : '' }}" type="text" name="fechaInicio" id="fechaInicio" placeholder="aaaa-mm-dd" value="{{ Request::old('fechaInicio') }}" required>
          </div>
          <div class="form-group col-6">
            <label for="fechaFin">Fin</label>
            <input class="form-control {{ $errors->has('fechaFin') ? 'is-invalid' : '' }}" type="text" name="fechaFin" id="fechaFin" placeholder="aaaa-mm-dd" value="{{ Request::old('fechaFin') }}" required>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary col-12">¡Crear Evento!</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
    </div>
  </div>
  <br><br>
@endsection