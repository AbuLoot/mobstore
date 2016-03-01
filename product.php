<?php 

require 'app/start.php';

if (empty($_GET['category_id']) OR empty($_GET['id']))
{
	$category = false;
	$product = false;
}
else
{
	$category_id = $_GET['category_id'];

	$sql = "SELECT * FROM categories
			WHERE id = :id
			LIMIT 1";

	$category = $db->prepare($sql);
	$category->execute(['id' => $category_id]);
	$category = $category->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM products
			WHERE id = :id";

	$product = $db->prepare($sql);
	$product->execute(['id' => $_GET['id']]);
	$product = $product->fetch(PDO::FETCH_ASSOC);

	$meta_title = $product['title'];
	$meta_description = $product['description'];
}

require VIEW_ROOT . '/content/product-show.php';
