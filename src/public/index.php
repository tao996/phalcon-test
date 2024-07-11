<?php

use Phalcon\Mvc\Application;

include_once '../bootstrap.php';
/**
 * @var $container Phalcon\Di\FactoryDefault
 */

$application = new Application($container);

try {
    $response = $application->handle($_SERVER["REQUEST_URI"]);
    $response->send();
} catch (\Exception $e) {
    echo 'Exception:', $e->getMessage();
}