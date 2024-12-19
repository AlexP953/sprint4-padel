<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
  protected $fillable = [ 'nombre', 'tipo_pista'];

  public function reservations()
  {
      return $this->hasMany(Reservation::class, 'id_pista'); 
  }
}
