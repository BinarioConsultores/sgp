<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 't_unidadmedida';
    protected $primaryKey = 'um_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'um_desc', 'um_abr'
  		];
    public function Partidas()
    {
      return $this->hasMany('sgp\Partidas','um_id');
    }
    public function PartidaDos()
    {
      return $this->hasMany('sgp\Partidas','um_id');
    }
    public function PartidaTres()
    {
      return $this->hasMany('sgp\Partidas','um_id');
    }
    public function RecursoUnidadMedidas()
    {
      return $this->hasMany('sgp\RecursoUnidadMedidas','um_id');
    }
}
