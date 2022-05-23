<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use HasFactory;
    public function test_user_can_view_a_login_form()
    {
        // $response = $this->get('/');

        $response->assertStatus(302);
    }

}
