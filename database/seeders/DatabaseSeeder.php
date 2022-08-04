<?php

namespace Database\Seeders;

use App\Models\Type;
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
        $dadosTypes = [
            ['name'=>'Venda'],
            ['name'=>'Aluguel'],
            ['name'=>'Ponto Comercial'],
        ];
        \App\Models\User::factory(10)->create();
        foreach ($dadosTypes as $d){
            Type::create($d);
        }
    }
}
