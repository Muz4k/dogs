#!/usr/bin/env php

<?php

$globalAutoloadPath = __DIR__ . '/../../../autoload.php';
$projectAutoloadPath = __DIR__ . '/../vendor/autoload.php';
if (file_exists($globalAutoloadPath)) {
    require_once $globalAutoloadPath;
} else {
    require_once $projectAutoloadPath;
}

use App\GreetCommand;

$f = new GreetCommand();
$f->configure();
