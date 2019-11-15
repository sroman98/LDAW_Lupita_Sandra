<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller {
  public function getDashboard() {
    $eventos = DB::table('eventos')->whereDate('fechaInicio', '>', Carbon::today())->get();
    return view('dashboard', ['eventos'=>$eventos]);
  }
}
