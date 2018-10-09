<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 't_factura';
    protected $primaryKey = 'fac_id';
   protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'fac_nro', 'fac_fech', 'fac_tipo', 'fac_est', 'fac_obs', 'prov_id', 'emp_id','pro_id'
  		];
  	public function Proveedor()
  	{
  		return $this->belongsTo('sgp\Proveedor','prov_id');
  	}
  	public function Empleado()
  	{
  		return $this->belongsTo('sgp\Empleado','emp_id');
  	}
  	public function FacturaDetalles()
  	{
  		return $this->hasMany('sgp\FacturaDetalle', 'fac_id');
  	}
    public function Proyecto()
    {
      return $this->belongsTo('sgp\Egreso', 'pro_id');
    }
}
