<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
  protected $table = 't_gasto';
  protected $primaryKey = 'gas_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'gas_nom',
  ];
  public function Proyectos()
  {
      return $this->hasMany('sgp\FacturaDetalle','gas_id');
  }
}

