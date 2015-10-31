<?php

require_once 'app/start.php';

$sql = "SELECT id, label, slug
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/home.php';
