<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty(): void
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue(): void
    {
        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue(): void
    {
        $this->queue->push('green');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

}