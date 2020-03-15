<?php

require_once __DIR__.'./vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$smModuleArg = false;

$paths = array(__DIR__.'\src\Models');

$isDevMode = true;

$dbParams = include(__DIR__.'/src/config.php');

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityMenager = EntityManager::create($dbParams['database'], $config);

return ConsoleRunner::createHelperSet($entityMenager);
