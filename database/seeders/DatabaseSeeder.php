<?php

namespace Database\Seeders;

use App\models\categoria;
use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        categoria::factory(10)->create();
        Marca::factory(10)->create();
    }
}
