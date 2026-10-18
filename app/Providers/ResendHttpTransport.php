<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\MessageConverter;

class ResendHttpTransport extends AbstractTransport
{
    public function __construct(private ?string $key)
    {
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        $list = fn (array $a) => array_map(fn (Address $x) => $x->toString(), $a);

        Http::withToken($this->key)
            ->post('https://api.resend.com/emails', array_filter([
                'from' => $email->getFrom()[0]->toString(),
                'to' => $list($email->getTo()),
                'cc' => $list($email->getCc()),
                'bcc' => $list($email->getBcc()),
                'subject' => $email->getSubject(),
                'html' => $email->getHtmlBody(),
                'text' => $email->getTextBody(),
            ]))
            ->throw();
    }

    public function __toString(): string
    {
        return 'resend-http';
    }
}
