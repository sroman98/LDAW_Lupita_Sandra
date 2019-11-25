<?php

namespace App\Http\Controllers;

use App\Boleto;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistentesController extends Controller {
  public function postAsistentes(Request $request) {
    $idEvento = $request['idEvento'];
    $siglas = $request['siglas'];
    $nombre = $request['nombre'];

    $evento = ["idevento"=>$idEvento, "siglas"=>$siglas, "nombre"=>$nombre];

    $asistentes = [];

    $boletos = DB::table('boletos')->where('idEvento', '=', $idEvento)->get();
    foreach ($boletos as $boleto) {
      $usuario = DB::table('usuarios')->where('idUsuario', '=', $boleto->idUsuario)->first();
      $empresa = DB::table('empresas')->where('idEmpresa', '=', $usuario->idEmpresa)->first();
      $asistente = ["usuario"=>$usuario->nombre.' '.$usuario->apellido,
        "telefono"=>$usuario->telefono,
        "correo"=>$usuario->correo,
        "empresa"=>$empresa->nombre,
        "estatus"=>$boleto->estatus];
      array_push($asistentes, $asistente);
    }

    return view('asistentes', ['evento' => $evento, 'asistentes' => $asistentes]);
  }
}

 ?>
