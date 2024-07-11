<?php

return [
    'database' => [
        'default' => 'mysql',
        'stores' => [
            'mysql' => [
                'host' => 'mysql',
                'port' => 3306,
                'dbname' => 'phalcon',
                'username' => 'admin',
                'password' => '123456',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'options' => [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ],
            ],
        ]
    ]
];