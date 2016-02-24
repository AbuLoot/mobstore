<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$sort_id = $_POST['sort_id'];
	$section_id = $_POST['section_id'];
	$title = $_POST['title'];
	$slug = latinize($title);
	$meta_title = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$content = $_POST['content'];

	$sql = "INSERT INTO categories (sort_id, section_id, slug, title, meta_title, meta_description, content)
			VALUES (:sort_id, :section_id, :slug, :title, :meta_title, :meta_description, :content)";

	$insertCategory = $db->prepare($sql);

	$insertCategory->execute([
		'sort_id' => $sort_id,
		'section_id' => $section_id,
		'slug' => $slug,
		'title' => $title,
		'meta_title' => $meta_title,
		'meta_description' => $meta_description,
		'content' => $content
	]);

	header('Location: ' . BASE_URL . '/admin/categories/index.php');
}

$sql = 'SELECT id, slug, title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/categories/add.php';