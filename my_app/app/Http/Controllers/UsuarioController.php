<?php
namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller {
  public function getDashboard() {
    return view('dashboard');
  }

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

    Auth::login($usuario);

    return redirect()->route('dashboard');
  }

  public function postLogin(Request $request) {
    $this->validate($request, [
      'correo' => 'required',
      'contrasena' => 'required'
    ]);

    if (Auth::attempt(['correo' => $request['correo'], 'password' => $request['contrasena']])) {
      return redirect()->route('dashboard');
    }
    echo "string lalalalala";
    return redirect()->back();
  }
}
?>
