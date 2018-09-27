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
        'pro_nom','pro_ubi','pro_cd','pro_gg', 'pro_uti', 'pro_fechin','pro_fechfin','pro_tipo','cli_id',
  ];
  public function Cliente()
  {
      return $this->belongsTo('sgp\Cliente','cli_id');
  }
  public function Ingresos()
  {
      return $this->hasMany('sgp\Ingreso','pro_id');
  }
  public function Valorizacionesc()
  {
      return $this->hasMany('sgp\Valorizacionc','pro_id');
  }
  public function Adelantos()
  {
      return $this->hasMany('sgp\Adelanto','pro_id');
  }
  public function Tareas()
  {
    return $this->hasMany('sgp\Tarea','pro_id');
  }
  public function Proyectousuarios()
  {
    return $this->hasMany('sgp\ProyectoUsuario','pro_id');
  }
  public function Presupuestos()
  {
    return $this->hasMany('sgp\Presupuesto','pro_id');
  }
  public function Egresos()
  {
    return $this->hasMany('sgp\Egreso','pro_id');
  }
  public function Cur()
  {
    return $this->hasMany('sgp\Cur','cur_id');
  }
}

