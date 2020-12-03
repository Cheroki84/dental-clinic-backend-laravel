<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function dentistas()
    {
        return $this->belongsToMany('App\Models\Dentista','dentista_cita');
    }
}
