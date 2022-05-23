<?php

namespace Tests\Unit;

use App\Models\Messages;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
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

    public function testMessageCreation()
    {
        $message = new Messages([
            'message' => 'Test Message',
            'user_id' => 2,
            'receiver' => 15,
            'is_seen' => 1
        ]);

        $this->assertEquals('Test Message', $message->message);
    }
}
