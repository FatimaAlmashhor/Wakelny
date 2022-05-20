<?php

namespace Tests\Feature;

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
    public function test_interacting_with_headers()
    {
        $this->visit('do_login')
                ->click('أذهب')
                ->seePageIs('/login');
    }
}
