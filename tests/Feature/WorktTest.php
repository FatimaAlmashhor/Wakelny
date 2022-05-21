<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorktTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $respones = $this->post('/saveUserWork', [
            'title' => 'library website',
            'comple_date' => '2021/4/21',
            'main_image'=>'default.png',
            'details' => 'website of library school in taiz',
            'link'=>'https://github.com/afnanalkadasi/library-ptoject',
          ]);
          $respones->assertStatus(302);
    }
}
