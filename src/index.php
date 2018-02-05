<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$application = new Application();

$application->add(new \Calc\Commands\Calculate());

$application->run();
