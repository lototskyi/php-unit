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

    public function testTokenIsAString()
    {
        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($this->item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($this->item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
