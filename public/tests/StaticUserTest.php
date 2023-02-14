<?php


use PHPUnit\Framework\TestCase;

class StaticUserTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new StaticUser('dave@example.com');

        $mock = Mockery::mock('alias:StaticMailer');

        $mock->shouldReceive('send')
             ->once()
             ->with($user->email, 'Hello!')
             ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));
    }
}
