<?php

namespace Tests\Feature\Auth;

use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_user_can_view_a_login_form()
    {

        $user = FactoriesFactory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
        // $response = $this->get('/login');

        // $response->assertSuccessful();
        // $response->assertViewIs('login');
    }
}