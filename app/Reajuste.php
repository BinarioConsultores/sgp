<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Reajuste extends Model
{
  protected $table = 't_reajuste';
  protected $primaryKey = 'rea_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'rea_nom','rea_monto','rea_oper','reac_id','valr_id'
  ];
  public function ReajusteCategorias()
  {
      return $this->belongsTo('sgp\ReajusteCategorias','reac_id');
  }
  public function Valorizacionesr()
  {
      return $this->belongsTo('sgp\Valorizacionr','valr_id');
  }
}
