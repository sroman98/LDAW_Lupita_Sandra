@extends('layouts.indexlayout')

@section('title')
  Iniciar sesión
@endsection

@section('content')
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
      <br><br><br><br>
      <h2>¡Hola!</h3>
      <h5>Por favor ingresa tu correo y contraseña para continuar</h5>
      <br>
      <form action="{{ route('login') }}" method="post">
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="email" name="correo" id="correo" value="{{ Request::old('correo') }}">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input class="form-control {{ $errors->has('contrasena') ? 'is-invalid' : '' }}" type="password" name="contrasena" id="contrasena" value="{{ Request::old('contrasena') }}">
        </div>
        <br>
        <button type="submit" class="btn col-12" style="background-color:black;color:white;">Entrar</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
      <br>
      <p>¿No tienes una cuenta? <a href="{{ url('signup') }}">Regístrate</a></p>
      <br><br><br><br>
    </div>
    <div class="col-6" style="padding-right: 0;">
      <img style="width: 100%; height: 100%;" src="{{ asset('img/bg.jpg') }}" alt="">
    </div>
  </div>
@endsection
