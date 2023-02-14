<?php


use PHPUnit\Framework\TestCase;

class StaticUserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new StaticUser('dave@example.com');

        //[StaticMailer::class, 'send'] - real clallable

        $user->setMailerCallable(function() {
            echo "mocked";

            return true;
        });

        $this->assertTrue($user->notify('Hello!'));
    }
}
