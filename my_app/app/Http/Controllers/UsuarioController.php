<?php
namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
?>
