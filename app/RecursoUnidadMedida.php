<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 't_recursounidadmedida';
    protected $primaryKey = 'recum';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'rec_id', 'um_id'
  	];

    public function UnidadMedida()
    {
      return $this->belongsTo('sgp\Recurso','rec_id');
    }
    public function UnidadMedida()
    {
      return $this->belongsTo('sgp\UnidadMedida','um_id');
    }
  	public function AnalisisCostoUnitarios()
  	{
  		return $this->hasMany('sgp\AnalisisCostoUnitarios','_recum_id');
  	}
    public function Precios()
    {
      return $this->hasMany('sgp\Precio','recum_id');
    }
    public function FacturaDetalles()
    {
      return $this->hasMany('sgp\FacturaDetalles','recum_id');
    }
}