<?php

require '../../app/start.php';

$sql = 'SELECT categories.id, categories.slug, categories.title, section.title AS section_title
		FROM categories
		LEFT JOIN section ON section.id = categories.section_id';

$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/categories/index.php';