<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Boleto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller {
  public function getDashboard() {
    $eventos = DB::table('eventos')->whereDate('fechaInicio', '>', Carbon::today())->get();
    $misboletos = DB::table('boletos')->where('idUsuario', '=', Auth::id())->get();
    return view('dashboard', ['eventos'=>$eventos, 'misboletos'=>$misboletos]);
  }

  public static function getAttendees($idEvento) {
    $cuenta = DB::table('boletos')->where('idEvento', '=', $idEvento)->count();
    return $cuenta;
  }
}
