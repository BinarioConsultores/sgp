<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
  protected $table = 't_persona';
  protected $primaryKey = 'per_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'per_nom','per_ape','per_tel','per_dni','per_dir','per_email',
  ];
  public function Usuarios()
  {
      return $this->hasMany('sgp\Usuario','per_id');
  }
  public function Empleados()
  {
      return $this->hasMany('sgp\Empleado','per_id');
  }
}
