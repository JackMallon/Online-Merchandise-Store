<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use Itb\WebApplication;

$app = new WebApplication();
$app->run();