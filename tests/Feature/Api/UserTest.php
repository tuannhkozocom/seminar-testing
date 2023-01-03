<?php

namespace Tests\Feature\Api;

use App\Services\PaymentService;
use Mockery\MockInterface;
use Spectator\Spectator;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Spectator::using('api-specs.yml');
    }

    public function test_get_all_users()
    {
        $mock = $this->mock(PaymentService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getCreditCard')
                ->andReturn('1111111111111111');
        });
        $response = $this->getJson('/api/users');
        $response->assertValidRequest()
            ->assertValidResponse();
        $response->assertStatus(200)
            ->assertJsonPath('0.credit_number', '1111111111111111');
    }
}
