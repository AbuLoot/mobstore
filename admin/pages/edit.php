<?php

require '../../app/start.php';

if (!empty($_POST))
{
    $notifications = validate($_POST, [
        'title' => 'length-min:3|length-max:30'
    ]);

    if (count($notifications) > 0)
    {
        $_SESSION['notifications'] = $notifications;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

	$sql = 'UPDATE pages
			SET slug = :slug,
				title = :title,
				meta_title = :meta_title,
				meta_description = :meta_description,
				content = :content
			WHERE id = :id';

	$updatePage = $db->prepare($sql);
	$updatePage->execute([
        'id' => (int) $_POST['id'],
		'title' => $_POST['title'],
		'slug' => (!empty($_POST['slug'])) ? $_POST['slug'] : latinize($_POST['title']),
		'meta_title' => $_POST['meta_title'],
		'meta_description' => $_POST['meta_description'],
		'content' => $_POST['content'],
	]);

	header('Location: ' . BASE_URL . '/admin/pages/index.php');
}

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/pages/index.php');
	die();
}

$sql = 'SELECT id, slug, title, meta_title, meta_description, content
		FROM pages
		WHERE id = :id';

$page = $db->prepare($sql);
$page->execute(['id' => $_GET['id']]);
$page = $page->fetch(PDO::FETCH_ASSOC);

$scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/pages/edit.php';