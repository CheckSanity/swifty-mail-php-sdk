<?php

use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Sanity\Swifty\Client\SwiftyClientBuilder;
use Sanity\Swifty\Client\SwiftySDK;

require_once __DIR__ . '/../vendor/autoload.php';

$clientBuilder = new SwiftyClientBuilder();
$clientBuilder->addPlugin(new HeaderDefaultsPlugin([
    'Accept' => 'application/json',
]));

$sdk = new SwiftySDK($clientBuilder);
$response = $sdk->sender()->send("secret_token", "new_form_submit", ["name" => "name"]);

echo json_encode($response);
