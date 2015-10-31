<?php

require '../app/start.php';

if (!empty($_POST))
{
	$id = $_POST['id'];
	$label = $_POST['label'];
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];

	$sql = 'UPDATE pages
			SET label = :label,
				title = :title,
				slug = :slug,
				body = :body,
				updated = NOW()
			WHERE id = :id';

	$updatePage = $db->prepare($sql);
	$updatePage->execute([
		'id' => $id,
		'label' => $label,
		'title' => $title,
		'slug' => $slug,
		'body' => $body
	]);

	header('Location: ' . BASE_URL . '/admin/list.php');
}

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/list.php');
	die();
}

$sql = 'SELECT id, label, title, slug, body
		FROM pages
		WHERE id = :id';

$page = $db->prepare($sql);

$page->execute(['id' => $_GET['id']]);

$page = $page->fetch(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/edit.php';