<?php

declare(strict_types=1);


$appEnv = env('APP_ENV', 'dev');

$logConfig = [
    'default' => [
        'handler' => [
            'class' => Monolog\Handler\RotatingFileHandler::class,
            'constructor' => [
                'filename' => BASE_PATH . '/runtime/logs/hyperf/hyperf.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => 'Y-m-d H:i:s',
                'allowInlineLineBreaks' => true,
            ],
        ],
    ],

    'request_log' => [
        'handler' => [
            'class' => Monolog\Handler\RotatingFileHandler ::class,
            'constructor' => [
                'filename' => BASE_PATH . '/runtime/logs/request_log/request.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => 'Y-m-d H:i:s',
                'allowInlineLineBreaks' => true,
            ],
        ],
    ],

    'response_log' => [
        'handler' => [
            'class' => Monolog\Handler\RotatingFileHandler ::class,
            'constructor' => [
                'filename' => BASE_PATH . '/runtime/logs/response_log/response.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => 'Y-m-d H:i:s',
                'allowInlineLineBreaks' => true,
            ],
        ],
    ],

    'sql_log' => [
            'handler' => [
            'class' => Monolog\Handler\RotatingFileHandler ::class,
            'constructor' => [
                'filename' => BASE_PATH . '/runtime/logs/sql_log/sql.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => 'Y-m-d H:i:s',
                'allowInlineLineBreaks' => true,
            ],
        ],
    ]
];


return $logConfig;
