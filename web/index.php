<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../app/container.php';

$app->get('/', [$app['controller'], 'searchAction'])->bind('index');
$app->get('/search', [$app['controller'], 'searchAction'])->bind('search');
$app->get('/report', [$app['controller'], 'reportAction'])->bind('report');

$app->run();