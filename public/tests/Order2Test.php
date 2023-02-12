<?php

//use Mockery\Adapter\Phpunit\MockeryTestCase;
use PHPUnit\Framework\TestCase;
class Order2Test extends TestCase
{

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new Order2(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');
        $gateway_mock->shouldReceive('charge')
            ->once()
            ->with($order->amount);

        $order->process($gateway_mock);
    }

    public function testOrderIsProcessedUsingASpy()
    {
        $order = new Order2(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_spy = Mockery::spy('PaymentGateway');

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived('charge')
                    ->once()
                    ->with($order->amount);
    }
}
