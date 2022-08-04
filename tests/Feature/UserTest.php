<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->actingAs($user);
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_create_user()
    {
        $response = $this->post('/login/create', [
            'name' => 'Admin',
            'email' => 'admin@master.com',
            'password' => '1q2w3e4r',
            'is_admin' => 1,
        ]);

        $response -> assertStatus(200);
    }

    public function test_delete_user()
    {

        $response = $this->post('/login/delete', [
            'name' => 'Admin',
            'email' => 'admin@master.com',
            'password' => '1q2w3e4r',
            'is_admin' => '1',
        ]);

        $response -> assertStatus(200);
    }

    public function test_only_logged_in_users_can_see_properties_list()
    {
        $response = $this->get('/admin/properties')
            ->assertRedirect('/login');
    }

    public function test_only_logged_in_users_can_see_cities_list()
    {
        $response = $this->get('/admin/cities')
            ->assertRedirect('/login');
    }

    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }

    
}
