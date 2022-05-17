<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WhithoutModelEvents;
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
       Marca::factory(10)->create();
       Categoria::factory(10)->create();
       
        // \App\Models\User::factory(10)->create();
    }
}
