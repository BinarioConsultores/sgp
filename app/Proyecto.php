<?php

namespace sgp;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
  protected $table = 't_proyecto';
  protected $primaryKey = 'pro_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'pro_nom','pro_ubi','pro_cd','pro_gg', 'pro_uti', 'pro_fechin','pro_fechfin','cli_id','tpro_id'
  ];
  public function Cliente()
  {
      return $this->belongsTo('sgp\Cliente','cli_id');
  }
  public function TipoProyecto()
  {
      return $this->belongsTo('sgp\TipoProyecto','tpro_id');
  }
  public function TipoProyectos()
  {
      return $this->hasMany('sgp\GastoTipo','pro_id');
  }
  public function Valorizacionesr()
  {
      return $this->hasMany('sgp\Valorizacionr','pro_id');
  }
  public function Valorizacionesc()
  {
      return $this->hasMany('sgp\Valorizacionc','pro_id');
  }
}

