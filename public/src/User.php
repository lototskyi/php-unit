<?php

class User
{
    public string $first_name = "";

    public string $surname = "";

    public string $email = "";

    protected Mailer $mailer;

    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim("$this->first_name $this->surname");
    }

    public function notify(string $message): bool
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}
