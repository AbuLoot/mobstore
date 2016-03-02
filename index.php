<?php

require_once 'app/start.php';

// Get hot products
$sql = "SELECT *
		FROM products
		WHERE status = 2
		LIMIT 12";

$hot_products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// Get new products
$sql = "SELECT *
		FROM products
		WHERE status <> 0
		ORDER BY id DESC
		LIMIT 12";

$new_products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/content/main.php';
