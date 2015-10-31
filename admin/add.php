<?php

require '../app/start.php';

if (!empty($_POST))
{
	$label = $_POST['label'];
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];

	$sql = "INSERT INTO pages (label, title, slug, body, created)
			VALUES (:label, :title, :slug, :body, NOW())";

	$insertPage = $db->prepare($sql);

	$insertPage->execute([
		'label' => $label,
		'title' => $title,
		'slug' => $slug,
		'body' => $body,
	]);

	header('Location: ' . BASE_URL . '/admin/list.php');
}

require VIEW_ROOT . '/admin/add.php';