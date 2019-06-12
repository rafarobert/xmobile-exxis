<?php
$db = getenv('DB_NAME');
$dbDNS = getenv('DB_DNS','localhost:3306');
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "mysql:host={$dbDNS};dbname={$db}",
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PWD'),
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
