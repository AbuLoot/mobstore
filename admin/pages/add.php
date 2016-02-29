<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$title = $_POST['title'];
	$slug = (!empty($_POST['slug'])) ? $_POST['slug'] : latinize($_POST['title']);
	$meta_title = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$content = $_POST['content'];

	$sql = "INSERT INTO pages (slug, title, meta_title, meta_description, content)
			VALUES (:slug, :title, :meta_title, :meta_description, :content)";

	$insertPage = $db->prepare($sql);

	$insertPage->execute([
		'slug' => $slug,
		'title' => $title,
		'meta_title' => $meta_title,
		'meta_description' => $meta_description,
		'content' => $content,
	]);

	header('Location: ' . BASE_URL . '/admin/pages/index.php');
}

$scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/pages/add.php';