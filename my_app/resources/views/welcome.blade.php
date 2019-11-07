@extends('layouts.master')

@section('title')
  Welcome!
@endsection

@section('content')
  <div class="row">
    <div class="col-6">
      <h3>Sign up</h3>
      <form action="{{ route('signup') }}" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input class="form-control" type="text" name="apellido" id="apellido">
        </div>
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input class="form-control" type="text" name="correo" id="correo">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input class="form-control" type="password" name="contrasena" id="contrasena">
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input class="form-control" type="text" name="telefono" id="telefono">
        </div>
        <div class="form-group">
          <label for="fechaNacimiento">Fecha de nacimiento</label>
          <input class="form-control" type="text" name="fechaNacimiento" id="fechaNacimiento" placeholder="aaaa-mm-dd">
        </div>
        <div class="form-group">
          <label for="idEmpresa">Empresa</label>
          <select class="form-control" type="text" name="idEmpresa" id="idEmpresa">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="idCiudad">Ciudad</label>
          <select class="form-control" type="text" name="idCiudad" id="idCiudad">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
    </div>

  </div>
@endsection
