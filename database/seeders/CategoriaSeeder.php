<?php

namespace Database\Seeders;
use Iluminate\Database\Console\Seeds\WhithoutModelEvents;
use Iluminate\Database\Seeder;


use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Categoria::factory(20)->create();
    }
}
