<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$id = $_POST['id'];
	$sort_id = $_POST['sort_id'];
	$title = $_POST['title'];
	$slug = latinize($title);

	$sql = 'UPDATE section
			SET sort_id = :sort_id,
				slug = :slug,
				title = :title
			WHERE id = :id';

	$updateSection = $db->prepare($sql);
	$updateSection->execute([
		'id' => $id,
		'sort_id' => $sort_id,
		'slug' => $slug,
		'title' => $title
	]);

	header('Location: ' . BASE_URL . '/admin/section/index.php');
}

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/section/index.php');
	die();
}

$sql = 'SELECT id, sort_id, slug, title
		FROM section
		WHERE id = :id';

$section = $db->prepare($sql);

$section->execute(['id' => $_GET['id']]);

$section = $section->fetch(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/section/edit.php';