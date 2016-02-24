<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$id = $_POST['id'];
	$sort_id = $_POST['sort_id'];
	$section_id = $_POST['section_id'];
	$title = $_POST['title'];
	$slug = latinize($title);
	$meta_title = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$content = $_POST['content'];

	$sql = 'UPDATE categories
			SET sort_id = :sort_id,
				section_id = :section_id,
				slug = :slug,
				title = :title,
				meta_title = :meta_title,
				meta_description = :meta_description,
				content = :content
			WHERE id = :id';

	$updateCategory = $db->prepare($sql);
	$updateCategory->execute([
		'id' => $id,
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

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/categories/index.php');
	die();
}

$sql = 'SELECT id, sort_id, section_id, slug, title, meta_title, meta_description, content
		FROM categories
		WHERE id = :id';

$category = $db->prepare($sql);

$category->execute(['id' => $_GET['id']]);

$category = $category->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT id, slug, title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/categories/edit.php';