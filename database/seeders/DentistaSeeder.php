<?php

namespace Database\Seeders;

use App\Models\Cita;
use App\Models\Dentista;
use Illuminate\Database\Seeder;

class DentistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dentista::factory(3)->create();
        $citas=Cita::all();
        $dentistas=Dentista::all();

            Cita::all()->each(
                function($cita){
                    $cita->dentistas()->attach(Dentista::find(rand(1,5)));
                });
    }
}
