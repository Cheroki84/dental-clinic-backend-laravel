<?php

namespace Database\Seeders;

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
        Dentista::factory(5)->create();
    }
}
