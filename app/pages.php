<?php

$sql = "SELECT id, slug, title
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * 
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

