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

    $sql = 'UPDATE products
            SET sort_id = :sort_id,
                category_id = :category_id,
                title = :title,
                slug = :slug,
                company = :company,
                count = :count,
                price = :price,
                description = :description,
                characteristic = :characteristic,
                status = :status
            WHERE id = :id';

    $updateProduct = $db->prepare($sql);
    $updateProduct->execute([
        'id' => (int) $_POST['id'],
        'sort_id' => (int) $_POST['sort_id'],
        'category_id' => (int) $_POST['category_id'],
        'title' => $_POST['title'],
        'slug' => latinize($_POST['title']),
        'company' => $_POST['company'],
        'count' => (int) $_POST['count'],
        'price' => (int) $_POST['price'],
        'description' => $_POST['description'],
        'characteristic' => $_POST['characteristic'],
        'status' => (int) $_POST['status']
    ]);

    header('Location: ' . BASE_URL . '/admin/products/index.php');
}

if (!isset($_GET['id']))
{
    header('Location: ' . BASE_URL . '/admin/products/index.php');
    die();
}

$sql = 'SELECT id, sort_id, category_id, slug, title, image, images, path, company, count, price, description, characteristic, status
        FROM products
        WHERE id = :id';

$product = $db->prepare($sql);
$product->execute(['id' => $_GET['id']]);
$product = $product->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT id, slug, title
        FROM categories';

$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/products/edit.php';