<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class CurdPlazo extends Model
{
  protected $table = 't_curdplazo';
  protected $primaryKey = 'curdp_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'curdp_cant','curdp_fechin','curdp_fechfin','curdp_nro','curd_id'
  ];
  
  public function CurDetalle()
  {
      return $this->belongsTo('sgp\CurDetalle','curd_id');
  }
}

