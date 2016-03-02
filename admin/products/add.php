<?php

require '../../app/start.php';

if (!empty($_POST))
{
    $notifications = validate($_POST, [
        'category_id' => 'required',
        'title' => 'required|length-min:3|length-max:80'
    ]);

    if (count($notifications) > 0)
    {
        $_SESSION['notifications'] = $notifications;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $image = '';
    $images = [];

    $time = getdate();
    $dir_images = $_POST['category_id'].'/'.$time['year'].'-'.$time['mon'].'-'.$time['mday'].'_'.time();
    $dir_uploads = __DIR__ . '/../../uploads/' . $dir_images;

    if (!file_exists($dir_uploads))
    {
        mkdir($dir_uploads, 0777, true);
    }

    if (isset($_FILES['images']) AND in_array(0, $_FILES['images']['error']))
    {
        $n = 0;

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
                        image_resize($file_width, $file_height, 252, 252, $file_type, $file_tmp, $dir_uploads, $image);
                    }

                    // Create mini images
                    image_resize($file_width, $file_height, 70, 70, $file_type, $file_tmp, $dir_uploads, 'mini-'.$random_name);

                    // Create presentaion images
                    image_resize($file_width, $file_height, 540, 540, $file_type, $file_tmp, $dir_uploads, 'present-'.$random_name);

                    // Upload origianl images
                    move_uploaded_file($file_tmp, $dir_uploads . '/original-'.$random_name);

                    $images[$i]['image'] = 'present-'.$random_name;
                    $images[$i]['mini_image'] = 'mini-'.$random_name;
                    $images[$i]['original_image'] = 'original-'.$random_name;
                }
            }
        }
    }

    $sql = "INSERT INTO products (title, slug, image, images, `path`, category_id, company, count, price, description, characteristic, status)
            VALUES (:title, :slug, :image, :images, :path, :category_id, :company, :count, :price, :description, :characteristic, :status)";

    $insertProduct = $db->prepare($sql);

    $insertProduct->execute([
        'title' => $_POST['title'],
        'slug' => latinize($_POST['title']),
        'image' => $image,
        'images' => serialize($images),
        'path' => $dir_images,
        'category_id' => (int) $_POST['category_id'],
        'company' => $_POST['company'],
        'count' => (int) $_POST['count'],
        'price' => (int) $_POST['price'],
        'description' => $_POST['description'],
        'characteristic' => $_POST['characteristic'],
        'status' => (int) $_POST['status']
    ]);

    header('Location: ' . BASE_URL . '/admin/products/index.php');
}

$sql = 'SELECT id, slug, title
        FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/products/add.php';