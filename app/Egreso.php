<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
  protected $table = 't_egreso';
  protected $primaryKey = 'egre_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'egre_monto','pro_id','facd_id','egre_idpadre',
  ];

  public function Proyecto()
  {
    return $this->belongsTo('sgp\Proyecto','pro_id');
  }
  public function FacturaDetalle()
  {
      return $this->belonsTo('sgp\FacturaDetalle','facd_id');
  }
  public function Egreso()
  {
    return $this->belongsTo('sgp\Egreso','egre_idpadre');
  }
}
