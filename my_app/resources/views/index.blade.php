@extends('layouts.master')

@section('title')
  Crear cuenta
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
      <h2>¡Hola!</h3>
      <h5>Por favor ingresa tu correo y contraseña para continuar</h5>
      <br>
      <form action="{{ route('login') }}" method="post">
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="text" name="correo" id="correo" value="{{ Request::old('correo') }}">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input class="form-control {{ $errors->has('contrasena') ? 'is-invalid' : '' }}" type="password" name="contrasena" id="contrasena" value="{{ Request::old('contrasena') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary col-12">Entrar</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
      <br>
      <p>¿No tienes una cuenta? <a href="{{ url('signup') }}">Regístrate</a></p>
    </div>
  </div>
  <br><br>
@endsection
