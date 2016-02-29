<?php 

require 'app/start.php';

if (empty($_GET['slug']))
{
	$category = false;
}
else
{
	$slug = $_GET['slug'];

	$sql = "SELECT * FROM categories
			WHERE slug = :slug
			LIMIT 1";

	$category = $db->prepare($sql);
	$category->execute(['slug' => $slug]);
	$category = $category->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM products
			WHERE category_id = :category_id";

	$products = $db->prepare($sql);
	$products->execute(['category_id' => $category['id']]);
	$products = $products->fetch(PDO::FETCH_ASSOC);
}

require VIEW_ROOT . '/page/show.php';
