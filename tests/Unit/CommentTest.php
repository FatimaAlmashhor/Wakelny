<?php

namespace Tests\Unit;

use App\Models\Comments;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
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

    public function testCommentCreation()
    {
        $comment = new Comments([
            'duration' => 100,
            'cost' => 100,
            'cost_after_taxs' => 100,
            'description' => 'Testing description using PHPUnit toole',
            'is_active' => 1
        ]);

        $this->assertEquals(100, $comment->duration);
    }
}
