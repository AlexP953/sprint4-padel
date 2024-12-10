<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [ 'id_user', 'fecha_inicio', 'fecha_final', 'id_pista'];

    // Relacion con Courts (N:1)
    public function court()
    {
        return $this->belongsTo(Court::class, 'id_pista');
    }

    // Relacion con Users (N:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
