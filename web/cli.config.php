<?php

require_once __DIR__.'./vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$smModuleArg = false;

foreach ($_SERVER['argv'] as $key->$val) {
    if (preg_match('/--sm-module/', $val)) {
        $smModuleArg = $val;
        unset($_SERVER['argv'][$key]);
        $_SERVER['argc'] = $_SERVER['argc']-1;
    }
}

if ($smModuleArg) {
    $path = array(__DIR__.'/src/'.explode(':', $smModuleArg)[1]);
} else {
    $paths = array(__DIR__.'/src/');
}

$isDevMode = true;

$dbParams = include(__DIR__./'src/config.php');

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityMenager = EntityManager::create($dbParams['database'], $config);

return ConsoleRunner::createHelperSet($entityMenager);
