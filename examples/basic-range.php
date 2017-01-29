#!/usr/bin/env php
<?php
use HylianShield\NumberGenerator\NumberGenerator;

require_once __DIR__ . '/../vendor/autoload.php';

$generator = new NumberGenerator();
$arguments = array_slice($argv, 1) ?: [1];

foreach ($generator->generateList(...$arguments) as $number) {
    echo $number . PHP_EOL;
}
