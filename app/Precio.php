<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
  protected $table = 't_precio';
  protected $primaryKey = 'prec_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'prec_monto','recum_id',
  ];
  public function RecursoUnidadMedida()
  {
      return $this->belongsTo('sgp\RecursoUnidadMedida','recum_id');
  }
}