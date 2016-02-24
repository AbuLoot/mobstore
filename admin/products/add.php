<?php

require '../../app/start.php';

if (!empty($_POST))
{
	if (isset($_FILES['images']) AND in_array(0, $_FILES['images']['error']))
	{
		for ($i=0; $i < count($_FILES['images']); $i++)
		{
			if ($_FILES['images']['error'][$i] == 0)
			{
				$file_name = $_FILES['images']['name'][$i];
				$file_tmp  = $_FILES['images']['tmp_name'][$i];
				$file_size = $_FILES['images']['size'][$i];
				$file_type = $_FILES['images']['type'][$i];

				list($width, $height) = getimagesize($file_tmp);

				$file_ext = explode('.', $file_name);
				$file_ext = strtolower(end($file_ext));

				$allowed = ['jpg', 'jpeg', 'png', 'gif'];

				if (in_array($file_ext, $allowed))
				{
					$new_width = 540;
					$new_height = 540;

					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_name_new_original = 'original_' . uniqid(true, true) . '.' . $file_ext;
					$file_destination = __DIR__ . '/../../uploads';

					// $thumb = imagecreatetruecolor($new_width, $new_height);
					// $source = imagecreatefromjpeg($file_tmp);
					// imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					// imagejpeg($thumb, $file_destination . '/' . $file_name_new, 100);

					switch ($file_type)
					{
						case 'image/jpeg':
							$thumb = imagecreatetruecolor($new_width, $new_height);
							$source = imagecreatefromjpeg($file_tmp);
							imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							imagejpeg($thumb, $file_destination . '/' . $file_name_new, 100);
							break;

						case 'image/png':
							$thumb = imagecreatetruecolor($new_width, $new_height);
							$source = imagecreatefrompng($file_tmp);
							imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							imagepng($thumb, $file_destination . '/' . $file_name_new, 100);
							break;

						case 'image/gif':
							$thumb = imagecreatetruecolor($new_width, $new_height);
							$image = imagecreatefromgif($file_tmp);
							imagecopyresampled($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							imagegif($thumb, $file_destination . '/' . $file_name_new, 100);
							break;
					}

					// Upload origianl image
					move_uploaded_file($file_tmp, $file_destination . '/' . $file_name_new_original);
				}
			}
		}
	}

	$title = $_POST['title'];
	$slug = latinize($title);
	$category_id = $_POST['category_id'];
	$company = $_POST['company'];
	$count = $_POST['count'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$characteristic = $_POST['characteristic'];

	$sql = "INSERT INTO products (title, slug, category_id, company, count, description, characteristic)
			VALUES (:title, :slug, :category_id, :company, :count, :description, :characteristic)";

	$insertProduct = $db->prepare($sql);

	$insertProduct->execute([
		'title' => $title,
		'category_id' => $category_id,
		'slug' => $slug,
		'title' => $title,
		'company' => $company,
		'count' => $count,
		'description' => $description,
		'characteristic' => $characteristic
	]);

	header('Location: ' . BASE_URL . '/admin/products/index.php');
}

$sql = 'SELECT id, slug, title
		FROM categories';

$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/products/add.php';