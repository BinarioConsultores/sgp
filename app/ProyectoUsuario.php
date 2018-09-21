<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class ProyectoUsuario extends Model
{
    protected $table = 't_proyectousuario';
    protected $primaryKey = 'prousu_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'pro_id', 'usu_id','prousu_cargo',
  		];
  	public function Proyecto()
    {
      return $this->belongsTo('sgp\Proyecto','pro_id');
    }
    public function Usuario()
  {
      return $this->belongsTo('sgp\Usuario','usu_id');
  }
}