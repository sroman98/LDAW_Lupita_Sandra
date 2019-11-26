<?php
namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\ResponseObject;

class UsuarioController extends Controller {
  public function postLogin(Request $request) {
    $this->validate($request, [
      'correo' => 'required',
      'contrasena' => 'required'
    ]);

    if (Auth::attempt(['correo' => $request['correo'], 'password' => $request['contrasena']])) {
      return redirect()->route('dashboard');
    }
    return redirect()->back();
  }

  public function getLogout() {
    Auth::logout();
    return redirect()->route('home');
  }

  // API
  public function store(Request $request) {
    $response = new ResponseObject;

    $validator = Validator::make($request->all(), [
      'nombre' => 'required',
      'apellido' => 'required',
      'correo' => 'required|email|unique:usuarios',
      'contrasena' => 'required|min:8',
      'telefono' => 'required|regex:/[0-9]{10}/',
      'fechaNacimiento' => 'required|date_format:Y-m-d',
      'idEmpresa' => 'required|numeric',
      'idCiudad' => 'required|numeric'
    ]);

    if($validator->fails()){
      $response->status = $response::status_failed;
      $response->code = $response::code_failed;
      foreach ($validator->errors()->getMessages() as $item) {
          array_push($response->messages, $item);
      }
    } else {
      $usuario = new Usuario();
      $usuario->nombre = $request['nombre'];
      $usuario->apellido = $request['apellido'];
      $usuario->correo = $request['correo'];
      $usuario->contrasena = bcrypt($request['contrasena']);
      $usuario->telefono = $request['telefono'];
      $usuario->fechaNacimiento = $request['fechaNacimiento'];
      $usuario->idEmpresa = $request['idEmpresa'];
      $usuario->idCiudad = $request['idCiudad'];
      $usuario->idRol = 2;
      $usuario->save();

      $response->status = $response::status_ok;
      $response->code = $response::code_ok;
      $response->result = $usuario;
    }

    return FacadeResponse::json($response);
    /*$this->validate($request, [
      'nombre' => 'required',
      'apellido' => 'required',
      'correo' => 'required|email|unique:usuarios',
      'contrasena' => 'required|min:8',
      'telefono' => 'required|regex:/[0-9]{10}/',
      'fechaNacimiento' => 'required|date_format:Y-m-d',
      'idEmpresa' => 'required|numeric',
      'idCiudad' => 'required|numeric',
      'idRol' => 'required|numeric'
    ]);*/

    /*$usuario = new Usuario();
    $usuario->nombre = $request['nombre'];
    $usuario->apellido = $request['apellido'];
    $usuario->correo = $request['correo'];
    $usuario->contrasena = bcrypt($request['contrasena']);
    $usuario->telefono = $request['telefono'];
    $usuario->fechaNacimiento = $request['fechaNacimiento'];
    $usuario->idEmpresa = $request['idEmpresa'];
    $usuario->idCiudad = $request['idCiudad'];
    $usuario->idRol = 2;

    $usuario->save();

    return response('Registro exitoso', 200)->header('Content-Type', 'text/plain');*/
  }
}
?>
