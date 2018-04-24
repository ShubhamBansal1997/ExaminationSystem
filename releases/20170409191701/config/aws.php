<?php

use Aws\Laravel\AwsServiceProvider;

return [
    'credentials' => [
        'key'    => 'AKIAJXMJK4OFOUOOVSJA',
        'secret' => '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',
    ],
    'region' => 'us-west-2',
    'version' => 'latest',

    // You can override settings for specific services
    'Ses' => [
        'region' => 'us-east-1',
    ],
];


