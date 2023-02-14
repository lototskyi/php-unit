<?php

/**
 * User
 *
 * An example user class
 */
class StaticUser
{

    /**
     * Email address
     * @var string
     */
    public $email;

    protected $mailer_callable;

    /**
     * Constructor
     *
     * @param string $email The user's email
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailerCallable(callable $mailer_callable)
    {
        $this->mailer_callable = $mailer_callable;
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     */
    public function notify(string $message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }
}