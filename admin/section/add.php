<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$sort_id = $_POST['sort_id'];
	$title = $_POST['title'];
	$slug = latinize($title);

	$sql = "INSERT INTO section (sort_id, slug, title)
			VALUES (:sort_id, :slug, :title)";

	$insertSection = $db->prepare($sql);

	$insertSection->execute([
		'sort_id' => $sort_id,
		'slug' => $slug,
		'title' => $title
	]);

	header('Location: ' . BASE_URL . '/admin/section/index.php');
}

require VIEW_ROOT . '/admin/section/add.php';