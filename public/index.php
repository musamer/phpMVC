<?php
session_start();
/** Path to this file */
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

echo ROOTPATH;
require '../app/core/init.php';
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
$app = new App;
$app->loadController();
