<?php

namespace App\Http\Controllers;

use App\Boleto;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroEventoController extends Controller {
  public function postRegistro(Request $request) {
    $idEvento = $request['idEvento'];
    $idUsuario = $request['idUsuario'];

    $boleto = new Boleto();
    $boleto->idEvento = $idEvento;
    $boleto->idUsuario = $idUsuario;
    $boleto->estatus = "Pendiente";

    $boleto->save();

    $evento = DB::table('eventos')->where('idEvento', '=', $boleto->idEvento)->get();
    return view('instruccionesPago', ['idBoleto' => $boleto->id, 'evento' => $evento[0]]);
  }
}

 ?>
