<?php

namespace sgp;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
  protected $table = 't_partida';
  protected $primaryKey = 'part_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'part_nom','part_prec','part_met','part_cod', 'part_rend', 'umr1_id','umr2_id','um_id','part_idpadre','pres_id',
  ];
  public function Presupuesto()
  {
      return $this->belongsTo('sgp\Presupuesto','pres_id');
  }
  public function UnidadMedida()
  {
      return $this->belongsTo('sgp\UnidadMedida','um_id');
  }
  public function UnidadMedida2()
  {
      return $this->belongsTo('sgp\UnidadMedida','umr2_id');
  }
  public function UnidadMedida3()
  {
      return $this->belongsTo('sgp\UnidadMedida','umr1_id');
  }
  public function Partida()
  {
      return $this->belongsTo('sgp\Partida','part_idpadre');
  }
  public function AnalisisCostoUnitarios()
  {
      return $this->hasMany('sgp\AnalisisCostoUnitarios','part_id');
  }
}
