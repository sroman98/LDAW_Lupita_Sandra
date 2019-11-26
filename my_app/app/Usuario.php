<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
  use \Illuminate\Auth\Authenticatable;

  protected $primaryKey = 'idUsuario';

  public function getAuthPassword() {
        return $this->contrasena;
  }

  public function hasAnyRole($role) {
    return $this->idRol === $role;
  }
}
