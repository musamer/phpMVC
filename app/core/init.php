<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
spl_autoload_register(function ($classname) {
    require $filename = '../app/model/' . ucfirst($classname) . '.php';
});

require_once 'config.php';
require_once 'functions.php';
require_once 'Database.php';
require_once 'Model.php';
require_once 'Controller.php';
require_once 'App.php';
