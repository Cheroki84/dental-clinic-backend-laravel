<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Cliente extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function citas()
    {
        return $this->hasMany('App\Models\Cita');
        return $this->belongsToMany('App\Models\Cita','cliente_cita');
    }

    public function dentistas()
    {
        return $this->belongsToMany('App\Models\Dentista','dentista_cita');
    }
}
