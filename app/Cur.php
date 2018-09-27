<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Cur extends Model
{
  protected $table = 't_cur';
  protected $primaryKey = 'cur_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'cur_dir','pro_id',
  ];
  public function Proyecto()
  {
      return $this->belongsTo('sgp\Proyecto','pro_id');
  }
  public function CurDetalles()
  {
      return $this->hasMany('sgp\CurDetalle','cur_id');
  }
}

