<?php

// Get all pages
$sql = "SELECT id, slug, title
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// Get all section
$sql = 'SELECT id, slug, title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
