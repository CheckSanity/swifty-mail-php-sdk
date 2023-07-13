<?php

declare(strict_types=1);

namespace Sanity\Swifty\Client\Endpoint;

use Sanity\Swifty\Client\HttpClient\Message\ResponseMediator;
use Sanity\Swifty\Client\SwiftySDK;

final class Sender
{
    private SwiftySDK $sdk;

    public function __construct(SwiftySDK $sdk)
    {
        $this->sdk = $sdk;
    }

    public function send(string $token, string $template, array $data): array
    {
        $body = [
            "token" => $token,
            "template" => $template,
            "data" => $data
        ];
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post('/sender/send', [], json_encode($body)));
    }
}
