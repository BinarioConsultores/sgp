<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class ArchivoTarea extends Model
{
  protected $table = 't_archivotarea';
  protected $primaryKey = 'archita_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'archita_nom','archita_peso','archita_tip','archita_dir','regitar_id',
  ];
   public function RegistroTarea()
  {
      return $this->belongsTo('sgp\RegistroTarea','regitar_id');
  }

  }