<?php

namespace App\Http\Controllers;

use App\Boleto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroEventoController extends Controller {
  public function postRegistro(Request $request) {
    $idEvento = $request['nombre'];
    $idUsuario = $request['apellido'];
    $estatus = $request['correo'];

    $boleto = new Boleto();
    $boleto->idEvento = $idEvento;
    $boleto->idUsuario = $idUsuario;
    $boleto->estatus = "Pendiente";

    $boleto->save();

    return redirect()->route('dashboard');
  }
}

 ?>
