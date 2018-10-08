<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class CurDetalle extends Model
{
  protected $table = 't_curdetalle';
  protected $primaryKey = 'curd_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'curd_cant','curd_prec','curd_idpadre','recum_id','cur_id',
  ];

  public function RecursoUnidadMedida()
  {
      return $this->belongsTo('sgp\RecursoUnidadMedida','recum_id');
  }
  public function Cur()
  {
      return $this->belongsTo('sgp\Cur','cur_id');
  }
  public function CurdPlazos()
  {
      return $this->hasMany('sgp\CurdPlazo','cur_id');
  }
  public function CurdPadre()
  {
      return $this->belongsTo('sgp\CurDetalle','curd_idpadre');
  }
}

