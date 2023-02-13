<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    protected Item $item;

    protected function setUp(): void
    {
        $this->item = new Item;
    }

    public function testDescriptionIsNotEmpty()
    {
        $this->assertNotEmpty($this->item->getDescription());
    }

    public function testIDIsAnInteger()
    {
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
    }

//    public function testTokenIsAString()
//    {
//        $item = new ItemChild;
//
//        $this->assertIsString($item->getToken());
//    }
}
