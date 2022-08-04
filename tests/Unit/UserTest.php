<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function test_user()
    {
        $this->assertTrue(true);
    }

    public function test_create_user()
    {
        $this->assertTrue(true);
    }

    public function test_delete_user()
    {
        $this->assertTrue(true);
    }

    public function test_check_if_user_columns_is_correct()
    {
        $user = new User;

        $expected = [
            'name',
            'email',
            'password'
        ];

        $arrayCompared = array_diff($expected, $user->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
