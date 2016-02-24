<?php

require '../../app/start.php';

if (isset($_GET['id']))
{
	$sql = 'DELETE FROM section
			WHERE id = :id';

	$deleteSection = $db->prepare($sql);
	$deleteSection->execute(['id' => $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/section/index.php');