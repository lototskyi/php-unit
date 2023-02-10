<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testReturnsFullName(): void
    {
        $user = new User;

        $user->first_name = "Teresa";
        $user->surname = "Green";

        $this->assertEquals("Teresa Green", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault(): void
    {
        $user = new User;

        $this->assertEquals("", $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name(): void
    {
        $user = new User;

        $user->first_name = "Teresa";

        $this->assertEquals("Teresa", $user->first_name);
    }

    public function testNotificationIsSent(): void
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
                    ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = "dave@example.com";
        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->onlyMethods([])
                            ->getMock();

//        $mock_mailer->method('sendMessage')
//                    ->will($this->throwException(new Exception()));

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify("Hello");
    }

}