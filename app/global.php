<?php

// Get all pages
$sql = "SELECT id, slug, title, meta_title, meta_description, content
		FROM pages";

$pages = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// Get all section
$sql = 'SELECT section.id, section.slug, section.title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
