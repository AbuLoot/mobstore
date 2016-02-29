<?php

require '../../app/start.php';

if (!empty($_POST))
{
    if (isset($_FILES['images']) AND in_array(0, $_FILES['images']['error']))
    {
        $n = 0;
        $old_images = unserialize($_POST['old_images']);

        for ($i = 0; $i < count($_FILES['images']['name']); $i++)
        {
            if ($_FILES['images']['error'][$i] == 0)
            {
                $file_name = $_FILES['images']['name'][$i];
                $file_tmp  = $_FILES['images']['tmp_name'][$i];
                $file_size = $_FILES['images']['size'][$i];
                $file_type = $_FILES['images']['type'][$i];

                list($file_width, $file_height) = getimagesize($file_tmp);

                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));

                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($file_ext, $allowed))
                {
                    $random_name = $i.'-'.time().'.'.$file_ext;

                    // Create preview image
                    if ($n == 0)
                    {
                        $n++;
                        $image = 'preview-' . $random_name;
                        // image_resize($file_width, $file_height, 252, 252, $file_type, $file_tmp, $dir_uploads, 'preview-'.$image);
                    }

                    // Create presentaion images
                    // image_resize($file_width, $file_height, 540, 540, $file_type, $file_tmp, $dir_uploads, 'present-'.$random_name);

                    // Upload origianl images
                    // move_uploaded_file($file_tmp, $dir_uploads . '/original-'.$random_name);

                    $images[$i]['image'] = 'present-'.$random_name;
                    $images[$i]['orginal_image'] = 'original-'.$random_name;
                }
            }
        }


        // print_r($old_images);
        print_r($_FILES['images']);
        print_r($images);
        $a = 0;
        foreach ($images as $key => $array)
        {
            echo $key . ' - ' . gettype($array) . '<br>';
        }
    }

    exit();

    $id = $_POST['id'];
    $sort_id = $_POST['sort_id'];
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $slug = latinize($title);
    $company = $_POST['company'];
    $count = $_POST['count'];
    $description = $_POST['description'];
    $characteristic = $_POST['characteristic'];

    $sql = 'UPDATE products
            SET sort_id = :sort_id,
                category_id = :category_id,
                slug = :slug,
                title = :title,
                image = :image,
                images = :images,
                title = :title,
                company = :company,
                count = :count,
                description = :description,
                characteristic = :characteristic
            WHERE id = :id';

    $updateCategory = $db->prepare($sql);
    $updateCategory->execute([
        'id' => $id,
        'sort_id' => $sort_id,
        'category_id' => $category_id,
        'slug' => $slug,
        'title' => $title,
        'image' => $image,
        'images' => serialize($images),
        'title' => $title,
        'company' => $company,
        'count' => $count,
        'description' => $description,
        'characteristic' => $characteristic
    ]);

    header('Location: ' . BASE_URL . '/admin/products/index.php');
}

if (!isset($_GET['id']))
{
    header('Location: ' . BASE_URL . '/admin/products/index.php');
    die();
}

$sql = 'SELECT id, sort_id, category_id, slug, title, image, images, path, company, count, price, description, characteristic
        FROM products
        WHERE id = :id';

$product = $db->prepare($sql);

$product->execute(['id' => $_GET['id']]);

$product = $product->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT id, slug, title
        FROM categories';

$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/products/edit.php';