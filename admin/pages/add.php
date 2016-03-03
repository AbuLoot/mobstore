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

	$sql = "INSERT INTO pages (title, slug, meta_title, meta_description, content)
			VALUES (:title, :slug, :meta_title, :meta_description, :content)";

	$insertPage = $db->prepare($sql);

	$insertPage->execute([
		'title' => $_POST['title'],
		'slug' => (!empty($_POST['slug'])) ? $_POST['slug'] : latinize($_POST['title']),
		'meta_title' => $_POST['meta_title'],
		'meta_description' => $_POST['meta_description'],
		'content' => $_POST['content'],
	]);

	header('Location: ' . BASE_URL . '/admin/pages/index.php');
}

$scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/pages/add.php';