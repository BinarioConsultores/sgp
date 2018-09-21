<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
  protected $table = 't_presupuesto';
  protected $primaryKey = 'pres_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'pres_dir','pro_id',
  ];
  public function Proyecto()
  {
      return $this->belongsTo('sgp\Proyecto','pro_id');
  }
  public function Partidas()
  {
      return $this->hasMany('sgp\Partida','pres_id');
  }
}
