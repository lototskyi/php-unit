<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty(): Queue
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsAddedToTheQueue(Queue $queue): Queue
    {
        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testAnItemIsAddedToTheQueue
     */
    public function testAnItemIsRemovedFromTheQueue($queue)
    {
        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals('green', $item);
    }

}