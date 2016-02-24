<?php 

require 'app/start.php';

if (empty($_GET['id']))
{
	$page = false;
}
else
{
	$slug = $_GET['id'];

	$sql = "SELECT * FROM pages
			WHERE slug = :slug
			LIMIT 1";

	$page = $db->prepare($sql);
	$page->execute(['slug' => $slug]);
	$page = $page->fetch(PDO::FETCH_ASSOC);
}

require VIEW_ROOT . '/page/show.php';