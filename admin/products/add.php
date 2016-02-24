<?php

require '../../app/start.php';

function image_resize($width, $height, $rwidth, $rheight, $type, $tmp, $path, $name)
{
    if ($width < $rwidth AND $height < $rheight)
    {
        $new_width = $width;
        $new_height = $height;
        $dst_x = round(($rwidth - $new_width) / 2);
        $dst_y = round(($rheight - $new_height) / 2);
    }
    elseif ($width == $height)
    {
        // Square
        $new_width = $rwidth;
        $new_height = $rheight;
        $dst_x = 0;
        $dst_y = 0;
    }
    elseif ($width > $height)
    {
        // Lying rectangle
        $new_width = $rwidth;
        $ratio = $new_width / $width;
        $new_height = round($height * $ratio);
        $dst_x = 0;
        $dst_y = round(($rheight - $new_height) / 2);
    }
    elseif ($width < $height)
    {
        // Standing rectangle
        $new_height = $rheight;
        $ratio = $new_height / $height;
        $new_width = round($width * $ratio);
        $dst_x = round(($rwidth - $new_width) / 2);
        $dst_y = 0;
    }

    switch ($type)
    {
        case 'image/jpeg':
            $thumb = imagecreatetruecolor($rwidth, $rheight);
            $white = imagecolorallocate($thumb, 255, 255, 255);
            imagefilledrectangle($thumb, 0, 0, $rwidth, $rheight, $white);
            $source = imagecreatefromjpeg($tmp);
            imagecopyresampled($thumb, $source, $dst_x, $dst_y, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($thumb, $path . '/' . $name, 90);
            break;

        case 'image/png':
            $thumb = imagecreatetruecolor($rwidth, $rheight);
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
            $source = imagecreatefrompng($tmp);
            imagecopyresampled($thumb, $source, $dst_x, $dst_y, 0, 0, $new_width, $new_height, $width, $height);
            imagepng($thumb, $path . '/' . $name, 5);
            break;

        case 'image/gif':
            $thumb = imagecreatetruecolor($rwidth, $rheight);
            $white = imagecolorallocate($thumb, 255, 255, 255);
            imagefilledrectangle($thumb, 0, 0, $rwidth, $rheight, $white);
            $source = imagecreatefromgif($tmp);
            imagecopyresampled($thumb, $source, $dst_x, $dst_y, 0, 0, $new_width, $new_height, $width, $height);
            imagegif($thumb, $path . '/' . $name);
            break;
    }

    return true;
}

if (!empty($_POST))
{
    $image = NULL;
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
        $i = 0;

        for ($i = 0; $i < count($_FILES['images']); $i++)
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
                    $new_file_name = time() . '.' . $file_ext;
                    $original_new_file_name = 'original_' . time() . '.' . $file_ext;

                    // Create preview image
                    if ($i == 0)
                    {
                        $i++;
                        $image = 'preview-' . $new_file_name;
                        image_resize($width, $height, 252, 252, $file_type, $file_tmp, $dir_uploads, $image);
                    }

                    // Create presentaion images
                    image_resize($width, $height, 540, 540, $file_type, $file_tmp, $dir_uploads, $new_file_name);

                    // Upload origianl images
                    move_uploaded_file($file_tmp, $dir_uploads . '/' . $original_new_file_name);

                    $images[$key]['image'] = $new_file_name;
                    $images[$key]['orginal_image'] = $original_new_file_name;
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

    $sql = "INSERT INTO products (slug, title, image, images, path, category_id, company, count, description, characteristic)
            VALUES (:slug, :title, :image, :images, :path, :category_id, :company, :count, :description, :characteristic)";

    $insertProduct = $db->prepare($sql);

    $insertProduct->execute([
        'slug' => $slug,
        'title' => $title,
        'image' => $image,
        'images' => json_encode($images),
        'path' => $dir_uploads,
        'category_id' => $category_id,
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