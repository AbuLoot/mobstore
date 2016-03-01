<?php 

require 'app/start.php';

if (empty($_GET['slug']))
{
	$page = false;
}
else
{
	$slug = $_GET['slug'];

	$sql = "SELECT * FROM pages
			WHERE slug = :slug
			LIMIT 1";

	$page = $db->prepare($sql);
	$page->execute(['slug' => $slug]);
	$page = $page->fetch(PDO::FETCH_ASSOC);
}

require VIEW_ROOT . '/content/page-show.php';