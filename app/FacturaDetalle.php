<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $table = 't_facturadetalle';
    protected $primaryKey = 'facd_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'facd_desc', 'facd_cant', 'facd_punit'.'fac_id', 'gas_id', 'recum_id'
  		];
  	public function Factura()
  	{
  		return $this->belongsTo('sgp\Factura','fac_id');
  	}
  	public function Gasto()
  	{
  		return $this->belongsTo('sgp\Gasto','gas_id');
  	}
  	public function RecursoUnidadMedida()
  	{
  		return $this->belongsTo('sgp\RecursoUnidadMedida','recum_id');
  	}
    public function Egreso()
    {
      return $this->hasMany('sgp\Egreso','facd_id');
    }
}
