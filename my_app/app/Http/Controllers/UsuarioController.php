<?php
namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
  public function postSignup(Request $request) {

    $this->validate($request, [
      'nombre' => 'required',
      'apellido' => 'required',
      'correo' => 'required|email|unique:usuarios',
      'contrasena' => 'required|min:8',
      'telefono' => 'required|regex:/[0-9]{10}/',
      'fechaNacimiento' => 'required|date_format:Y-m-d'
    ]);

    $nombre = $request['nombre'];
    $apellido = $request['apellido'];
    $correo = $request['correo'];
    $contrasena = bcrypt($request['contrasena']);
    $telefono = $request['telefono'];
    $fechaNacimiento = $request['fechaNacimiento'];
    $idEmpresa = $request['idEmpresa'];
    $idCiudad = $request['idCiudad'];

    $usuario = new Usuario();
    $usuario->nombre = $nombre;
    $usuario->apellido = $apellido;
    $usuario->correo = $correo;
    $usuario->contrasena = $contrasena;
    $usuario->telefono = $telefono;
    $usuario->fechaNacimiento = $fechaNacimiento;
    $usuario->idEmpresa = $idEmpresa;
    $usuario->idCiudad = $idCiudad;

    $usuario->save();

    return redirect()->back();
  }
}
?>
