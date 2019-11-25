@extends('layouts.master')

@section('title')
  Asistentes
@endsection

@section('content')
  <br><br>
  <h2 class="text-primary">Asistentes</h2>
  <h1>{{ $evento["siglas"] }} - {{ $evento["nombre"] }}</h1>
  <br><br>
  @if(count($asistentes) > 0)
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Correo</th>
          <th scope="col">Empresa</th>
          <th scope="col">Estatus</th>
        </tr>
      </thead>
      <tbody>
        @foreach($asistentes as $asistente)
          <tr>
            <th scope="row">{{ $asistente["usuario"] }}</th>
            <td>{{ $asistente["telefono"] }}</td>
            <td>{{ $asistente["correo"] }}</td>
            <td>{{ $asistente["empresa"] }}</td>
            <td>{{ $asistente["estatus"] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h3>Aún no se ha registrado nadie, lo siento 😔</h3>
  @endif

@endsection
