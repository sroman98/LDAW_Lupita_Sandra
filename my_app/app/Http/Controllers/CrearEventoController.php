<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrearEventoController extends Controller {
  public function getCrearEvento() {
    return view('crearEvento');
  }
}
