<?php

require '../app/start.php';

$sql = 'SELECT id, label, title, slug
		FROM pages
		ORDER BY created DESC';

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// foreach ($pages as $page) {
	// $page['label'];
	// print_r($page);
// }

require VIEW_ROOT . '/admin/list.php';