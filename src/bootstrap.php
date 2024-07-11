<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;

const APP_PATH = __DIR__; // /var/www == src
//var_dump(APP_PATH);exit;
$appConfig = include_once __DIR__ . '/config/config.php';

$loader = new \Phalcon\Autoload\Loader();
$loader->setDirectories([
    APP_PATH . '/controllers/',
    APP_PATH . '/models/'
]);
$loader->register();

$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');

        return $view;
    }
);
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    }
);

$container->set('db', function () use ($appConfig) {
    $driver = $appConfig['database']['default'];
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $driver;
    $params = $appConfig['database']['stores'][$driver];
    return new $class($params);
});