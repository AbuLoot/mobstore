<?php

require '../../app/start.php';

if (isset($_GET['id']))
{
	$sql = 'DELETE FROM products
			WHERE id = :id';

	$deleteCategory = $db->prepare($sql);
	$deleteCategory->execute(['id' => $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/products/index.php');