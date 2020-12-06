<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dentistas()
    {
        return $this->belongsToMany('App\Models\Dentista','dentista_cita');
    }

    public function clientes()
    {
        return $this->belongsToMany('App\Models\Cliente','cliente_cita');
    }
}
