<?php

require '../../app/start.php';

$sql = 'SELECT id, category_id, slug, title, image, status
		FROM products';

$products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/products/index.php';