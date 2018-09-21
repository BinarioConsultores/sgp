<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class RegistroTarea extends Model
{
  protected $table = 't_registrotarea';
  protected $primaryKey = 'regitar_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  //adsfasf
  protected $fillable = [
        'regitar_por','regitar_tit','regitar_desc','regitar_tiporeg','regitar_tiporeg','regitar_fech','tar_id',
  ];
  public function Tarea()
  {
    return $this->belongsTo('sgp\Tarea','tar_id');
  }

  public function ArchivoTareas()
  {
      return $this->hasMany('sgp\ArchivoTarea','regitar_id');
  }
}