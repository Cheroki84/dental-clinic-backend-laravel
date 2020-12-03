<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;

    protected $table = 'dentistas';

    public function citas()
    {
        return $this->belongsToMany('App\Models\Cita', 'dentista_cita');
    }
}
