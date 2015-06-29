<?php


use Composer\Autoload\ClassLoader;


if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    throw new \RuntimeException('Install dependencies to run test suite.');
}

/**
 * @var $loader ClassLoader
 */
$loader = require __DIR__ . '/../vendor/autoload.php';