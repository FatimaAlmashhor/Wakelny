<?php

namespace Tests\Unit;

use App\Models\Posts;
// use App\Http\Livewire\Post;
use PHPUnit\Framework\TestCase;


class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testPostCreation()
    {
        $post = new Posts([
            'title' => "Tested Post",
            'desciption' => "tested post using PHPUnit Test tool",
            'cost' => '100$',
            'duration' => 100,
            'status' => 'closed',
            'offers' => 1,
            'is_active' => 1 
        ]);

        $this->assertEquals('Tested Post', $post->title);
    }
}
