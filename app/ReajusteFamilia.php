<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class ReajusteFamilia extends Model
{
  protected $table = 't_reajustefamilia';
  protected $primaryKey = 'reaf_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'reaf_nom',
  ];
  public function ReajusteCategorias()
  {
      return $this->hasMany('sgp\ReajusteCategoria','reaf_id');
  }
}
