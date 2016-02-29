<?php

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('BASE_URL', 'http://mobistore');
define('VIEW_ROOT', APP_ROOT . '/views');

$db = new PDO('mysql:host=localhost;dbname=mobistore', 'root', 'bireki');

require 'functions.php';
require 'pages.php';

$sql = 'SELECT section.id, section.slug, section.title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
