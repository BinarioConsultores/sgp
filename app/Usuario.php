<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 't_usuario';
    protected $primaryKey = 'usu_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'usu_nom', 'usu_tip','usu_email','usu_pass','per_id',
  		];
  	public function ProyectoUsuarios()
    {
      return $this->hasMany('sgp\ProyectoUsuario','usu_id');
    }
    public function Tareas()
    {
      return $this->hasMany('sgp\Tarea','usu_id');
    }
     public function Persona()
  {
      return $this->belongsTo('sgp\Persona','per_id');
  }
}