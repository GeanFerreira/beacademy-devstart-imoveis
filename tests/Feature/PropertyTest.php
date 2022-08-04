<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_create_user()
    {
        $response = $this->post('/cities/create', [
            'title' => 'Teste',
            'terreno' => '120',
            'salas' => '1',
            'banheiros' => '2',
            'dormitorios' => '3',
            'garagens' => '1',
            'descricao' => 'Teste',
            'preco' => '100000'
        ]);

        $response -> assertStatus(200);
    }

    public function test_delete_user()
    {

        $response = $this->post('/cities/delete', [
            'name' => 'Admin',
            'email' => 'admin@master.com',
            'password' => '1q2w3e4r',
            'is_admin' => '1',
        ]);

        $response -> assertStatus(200);
    }
}
