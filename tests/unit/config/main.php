<?php

$baseDir = realpath(__DIR__ . '/..');

return [
    'id' => 'testapp',
    'basePath' => $baseDir,
    'aliases' => [
        '@web' => '/',
        '@webroot' => $baseDir . '/runtime',
        '@vendor' => realpath($baseDir . '/../../vendor'),
        '@bower' => realpath($baseDir . '/../../vendor/bower'),
    ]
];