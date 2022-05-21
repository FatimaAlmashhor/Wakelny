<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_report()
    {
        $respones = $this->post('/saveReport', [
            'type_report' => 'users nose',
            'massege' => 'clidfjkfvfjkent'
          ]);
          $respones->assertStatus(302);
    }

}
