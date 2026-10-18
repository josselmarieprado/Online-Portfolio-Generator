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

        $people = fn (array $list) => array_map(
            fn (Address $a) => array_filter([
                'email' => $a->getAddress(),
                'name' => $a->getName(),
            ]),
            $list
        );

        $from = $email->getFrom()[0];

        Http::withHeaders([
            'api-key' => $this->key,
            'accept' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', array_filter([
            'sender' => array_filter([
                'email' => $from->getAddress(),
                'name' => $from->getName(),
            ]),
            'to' => $people($email->getTo()),
            'cc' => $people($email->getCc()),
            'bcc' => $people($email->getBcc()),
            'subject' => $email->getSubject(),
            'htmlContent' => $email->getHtmlBody(),
            'textContent' => $email->getTextBody(),
        ]))->throw();
    }

    public function __toString(): string
    {
        return 'brevo-http';
    }
}
