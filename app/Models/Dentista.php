<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Dentista extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];

    //protected $guard = 'api-dentistas';

    protected $hidden = ['password'];

    //protected $table = 'dentistas';

    public function citas()
    {
        return $this->belongsToMany('App\Models\Cita', 'dentista_cita');
    }
}
