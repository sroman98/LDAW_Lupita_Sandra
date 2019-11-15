<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrearEventoController extends Controller {
  public function getCrearEvento() {
    return view('crearEvento');
  }

  public function postEvento(Request $request) {
    $this->validate($request, [
      'nombre' => 'required|string',
      'siglas' => 'required|string|size:3',
      'descripcion' => 'required',
      'maxAsistentes' => 'required|numeric|gt:0',
      'costo' => 'required|numeric|gt:0',
      'lugar' => 'required|string',
      'fechaInicio' => 'required|date_format:Y-m-d H:i:s|after:today',
      'fechaFin' => 'required|date_format:Y-m-d H:i:s|after:fechaInicio'
    ]);

    $nombre = $request['nombre'];
    $siglas = $request['siglas'];
    $descripcion = $request['descripcion'];
    $maxAsistentes = $request['maxAsistentes'];
    $costo = $request['costo'];
    $lugar = $request['lugar'];
    $fechaInicio = $request['fechaInicio'];
    $fechaFin = $request['fechaFin'];

    $evento = new Evento();
    $evento->nombre = $nombre;
    $evento->siglas = $siglas;
    $evento->descripcion = $descripcion;
    $evento->maxAsistentes = $maxAsistentes;
    $evento->costo = $costo;
    $evento->lugar = $lugar;
    $evento->fechaInicio = $fechaInicio;
    $evento->fechaFin = $fechaFin;

    $evento->save();

    return redirect()->route('dashboard');
  }
}
