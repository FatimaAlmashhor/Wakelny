<?php

namespace Tests\Unit;

use App\Models\Wallet;
use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
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

    public function testWalletCreation()
    {
        $wallet = new Wallet([
            'holder_type' => 'App\Model\User',
            'holdet_id' => 2,
            'name' => 'Default Wallet',
            'slug' => 'default',
            'uuid' => '510575d7-4744-4b6c-a056-a1d93afbc9b2',
            'balance' => 10000,
            'decimal_places' => 2
        ]);

        $this->assertEquals('App\Model\User', $wallet->holder_type);
    }
}
