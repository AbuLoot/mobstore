<?php

require '../../app/start.php';

$sql = 'SELECT id, title, slug
		FROM pages';

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/pages/index.php';