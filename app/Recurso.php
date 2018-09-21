<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
  protected $table = 't_recurso';
  protected $primaryKey = 'rec_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'rec_nom','rec_cod',
  ];
  public function Recursounidadmedidas()
  {
      return $this->hasMany('sgp\RecursoUnidadMedida','rec_id');
  }
}

