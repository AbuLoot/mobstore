<?php

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views');
define('VIEW_HEADER', VIEW_ROOT . '/templates/header.php');
define('VIEW_FOOTER', VIEW_ROOT . '/templates/footer.php');
define('BASE_URL', 'http://cms');

$db = new PDO('mysql:host=localhost;dbname=cms', 'root', 'bireki');

require 'functions.php';
