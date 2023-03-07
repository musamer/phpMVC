<?php
session_start();

/** Valid PHP Version ? */
$minPPHVersion = '8.0';
if (phpversion() < $minPPHVersion)
    die("your php version must be { $minPHPVersion } or higher to run this app. your current version is" . phpversion());

/** Path to this file */
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require '../app/core/init.php';
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
$app = new App;
$app->loadController();

