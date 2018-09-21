<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class AnalisisCostoUnitario extends Model
{
  protected $table = 't_analisiscostounitario';
  protected $primaryKey = 'acu_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'acu_prec','acu_cant','acu_cuad','part_id','recum_id','acu_idpadre',
  ];
  public function Partida()
  {
  	return $this->belongsTo('sgp\Partida','part_id');
  }
    public function RecursoUnidadMedida()
  {
  	return $this->belongsTo('sgp\RecursoUnidadMedida','recum_id');
  }
    public function RecursoUnidadMedida()
  {
  	return $this->belongsTo('sgp\RecursoUnidadMedida','acu_idpadre');
  }
}
