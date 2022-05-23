<?php

namespace Tests\Unit;

use App\Models\User;

use App\Models\Posts;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

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

    public function test_login_redirect_to_dashboard_admin()
    {
        $respones = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ]);
        $respones->assertStatus(302);
        // $respones->assertRedirect('/admin');
    }

    public function test_login_redirect_to_dashboard_user()
    {
        $respones = $this->post('/login', [
            'email' => 'client@gmail.com',
            'password' => 'client'
        ]);
        $respones->assertStatus(302);
        // $respones->assertRedirect('/controllpannel');
    }
}