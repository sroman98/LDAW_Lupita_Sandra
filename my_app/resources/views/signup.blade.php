@extends('layouts.indexlayout')

@section('title')
  Crear cuenta
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
      <br><br>
      <h2>¡Bienvenido!</h3>
      <h5>Por favor llena el siguiente formulario para continuar</h5>
      <br>
      <form action="{{ route('signup') }}" method="post">
        <div class="row">
          <div class="form-group col-6">
            <label for="nombre">Nombre</label>
            <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ Request::old('nombre') }}" required>
          </div>
          <div class="form-group col-6">
            <label for="apellido">Apellido</label>
            <input class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" type="text" name="apellido" id="apellido" value="{{ Request::old('apellido') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="email" name="correo" id="correo" value="{{ Request::old('correo') }}" required>
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input class="form-control {{ $errors->has('contrasena') ? 'is-invalid' : '' }}" type="password" name="contrasena" id="contrasena" value="{{ Request::old('contrasena') }}" required>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="telefono">Teléfono</label>
            <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="tel" pattern="[0-9]{10}" name="telefono" id="telefono" value="{{ Request::old('telefono') }}" required>
          </div>
          <div class="form-group col-6">
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input class="form-control {{ $errors->has('fechaNacimiento') ? 'is-invalid' : '' }}" type="text" name="fechaNacimiento" id="fechaNacimiento" placeholder="aaaa-mm-dd" value="{{ Request::old('fechaNacimiento') }}" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="idEmpresa">Empresa</label>
            <select class="form-control {{ $errors->has('idEmpresa') ? 'is-invalid' : '' }}" type="text" name="idEmpresa" id="idEmpresa" value="{{ Request::old('idEmpresa') }}">
              @foreach($empresas as $empresa)
                <option value="{{$empresa->idEmpresa}}" {{ Request::old('idEmpresa') == $empresa->idEmpresa ? 'selected' : '' }}>{{$empresa->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-6">
            <label for="idCiudad">Ciudad</label>
            <select class="form-control {{ $errors->has('idCiudad') ? 'is-invalid' : '' }}" type="text" name="idCiudad" id="idCiudad" value="{{ Request::old('idCiudad') }}">
              @foreach($ciudades as $ciudad)
                <option value="{{$ciudad->idCiudad}}" {{ Request::old('idCiudad') == $ciudad->idCiudad ? 'selected' : '' }}>{{$ciudad->nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <br>
        <button type="submit" class="btn col-12" style="background-color:black;color:white;">Crear</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
      <br><br>
    </div>
    <div class="col-6" style="padding-right: 0;">
      <img style="width: 100%; height: 100%;" src="{{ asset('img/bg.jpg') }}" alt="">
    </div>
  </div>
@endsection
