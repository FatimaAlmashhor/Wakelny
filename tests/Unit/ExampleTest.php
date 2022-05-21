<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Post;
use App\Models\Posts;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    public function testUserCreation()
    {
        $user = new User([
            'name' => "Test User",
            'email' => "test@mail.com",
            'password' => hash("sha256", "testpassword", true)
        ]);

        $this->assertEquals('Test User', $user->name);
    }
    public function testPostCreation()
    {
        $user = new Posts([
            'title' => "Test User",
            'email' => "test@mail.com",
            'password' => hash("sha256", "testpassword", true)
        ]);

        $this->assertEquals('Test User', $user->name);
    }
}