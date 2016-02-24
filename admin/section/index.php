<?php

require '../../app/start.php';

$sql = 'SELECT id, sort_id, title, slug
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/section/index.php';