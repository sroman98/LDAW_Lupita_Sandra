@extends('layouts.master')

@section('title')
  Eventos
@endsection

@section('content')
  <br><br>

  <h2>¡Te has registrado exitosamente!</h2>
  <br>
  <h5>Evento: {{ $evento->nombre }}</h5>
  <br>
  <h5>Instrucciones de pago:</h5>
  <br>
  <p>1. Realiza un depósito por la cantidad de ${{ $evento->costo }} </p>
  <p>2. Envía tu comprobante al correo comprobantes@tticket.com</p>
  <p>3. En el correo especifica el asunto <b>"Comprobante de pago del boleto {{ $idBoleto }}"</b></p>
  <br>
  <div class="row">
    <div class="col-3">
      <a class="btn btn-primary col-12" name="button" href="{{ route('dashboard') }}">Ok</a>
    </div>
  </div>
@endsection
