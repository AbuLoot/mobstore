<?php

$sql = "SELECT id, slug, title, meta_title, meta_description, content
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

