<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 't_empleado';
    protected $primaryKey = 'emp_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'per_id',
  	];
  	
    public function Facturas()
  	{
  		return $this->hasMany('sgp\Factura','emp_id');
  	}
    public function Persona()
    {
      return $this->belongsTo('sgp\Persona','per_id');
    }
}
