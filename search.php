<?php 

require 'app/start.php';

if (empty($_GET['keywords']))
{
    header('Location: ' . BASE_URL);
}
else
{
	$keywords = clear_data($_GET['keywords']);

	$sql = "SELECT *
			FROM products
			WHERE title LIKE :keywords
			OR description LIKE :keywords";

	$search = $db->prepare($sql);
	$search->execute([':keywords' => '%'.$keywords.'%']);
	$products = $search->fetchAll(PDO::FETCH_ASSOC);
}

require VIEW_ROOT . '/content/products-result.php';
