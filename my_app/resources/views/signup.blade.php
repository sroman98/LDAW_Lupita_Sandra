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
      <h2>¡Bienvenido!</h3>
      <h5>Por favor llena el siguiente formulario para continuar</h5>
      <br>
      <form action="{{ route('signup') }}" method="post">
        <div class="row">
          <div class="form-group col-6">
            <label for="nombre">Nombre</label>
            <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ Request::old('nombre') }}">
          </div>
          <div class="form-group col-6">
            <label for="apellido">Apellido</label>
            <input class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" type="text" name="apellido" id="apellido" value="{{ Request::old('apellido') }}">
          </div>
        </div>
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="text" name="correo" id="correo" value="{{ Request::old('correo') }}">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input class="form-control {{ $errors->has('contrasena') ? 'is-invalid' : '' }}" type="password" name="contrasena" id="contrasena" value="{{ Request::old('contrasena') }}">
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="telefono">Teléfono</label>
            <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ Request::old('telefono') }}">
          </div>
          <div class="form-group col-6">
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input class="form-control {{ $errors->has('fechaNacimiento') ? 'is-invalid' : '' }}" type="text" name="fechaNacimiento" id="fechaNacimiento" placeholder="aaaa-mm-dd" value="{{ Request::old('fechaNacimiento') }}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="idEmpresa">Empresa</label>
            <select class="form-control {{ $errors->has('idEmpresa') ? 'is-invalid' : '' }}" type="text" name="idEmpresa" id="idEmpresa" value="{{ Request::old('idEmpresa') }}">
              <option value="1" {{ Request::old('idEmpresa') == 1 ? 'selected' : '' }}>Coca-Cola</option>
              <option value="2" {{ Request::old('idEmpresa') == 2 ? 'selected' : '' }}>Apple</option>
              <option value="3" {{ Request::old('idEmpresa') == 3 ? 'selected' : '' }}>Facebook</option>
              <option value="4" {{ Request::old('idEmpresa') == 4 ? 'selected' : '' }}>Abercrombie & Fitch</option>
              <option value="5" {{ Request::old('idEmpresa') == 5 ? 'selected' : '' }}>Milk</option>
            </select>
          </div>
          <div class="form-group col-6">
            <label for="idCiudad">Ciudad</label>
            <select class="form-control {{ $errors->has('idCiudad') ? 'is-invalid' : '' }}" type="text" name="idCiudad" id="idCiudad" value="{{ Request::old('idCiudad') }}">
              <option value="1" {{ Request::old('idCiudad') == 1 ? 'selected' : '' }}>Querétaro</option>
              <option value="2" {{ Request::old('idCiudad') == 2 ? 'selected' : '' }}>Menlo Park</option>
              <option value="3" {{ Request::old('idCiudad') == 3 ? 'selected' : '' }}>Sunnyvale</option>
              <option value="4" {{ Request::old('idCiudad') == 4 ? 'selected' : '' }}>San Francisco</option>
              <option value="5" {{ Request::old('idCiudad') == 5 ? 'selected' : '' }}>Monterrey</option>
            </select>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary col-12">Crear</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
    </div>
  </div>
  <br><br>
@endsection
