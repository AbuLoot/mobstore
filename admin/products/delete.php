<?php

require '../../app/start.php';

if (isset($_GET['id']))
{

	$sql = 'SELECT image, images, path
	        FROM products
	        WHERE id = :id';

	$product = $db->prepare($sql);
	$product->execute(['id' => $_GET['id']]);
	$product = $product->fetch(PDO::FETCH_ASSOC);

	$images = unserialize($product['images']);


	// Delete preview image
	unlink(__DIR__.'/../../uploads/'.$product['path'].'/'.$product['image']);

	// Delete all images
	foreach ($images as $image)
	{
		unlink(__DIR__.'/../../uploads/'.$product['path'].'/'.$image['image']);
		unlink(__DIR__.'/../../uploads/'.$product['path'].'/'.$image['mini_image']);
		unlink(__DIR__.'/../../uploads/'.$product['path'].'/'.$image['original_image']);
	}

	// Delete directory
	if (is_dir(__DIR__.'/../../uploads/'.$product['path']))
	{
		rmdir(__DIR__.'/../../uploads/'.$product['path']);
	}

	// Delete product from database
	$sql = 'DELETE FROM products
			WHERE id = :id';

	$deleteProduct = $db->prepare($sql);
	$deleteProduct->execute(['id' => $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/products/index.php');