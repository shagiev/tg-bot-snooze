<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

$container = new \App\Core\DIContainer('config/services.yaml');

/** @var \App\Core\Application $application */
$application = $container->get('App\Core\Application');

$application->run();
