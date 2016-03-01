<?php require VIEW_ROOT.'/templates/header.php'; ?>

  <ol class="breadcrumb">
    <li><a href="<?= BASE_URL ?>"><span class="glyphicon glyphicon-home"></span> Главная</a></li>
    <li class="active"><?= $category['title'] ?></li>
  </ol>

  <div class="row">
    <?php foreach ($products as $product) : ?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="<?= BASE_URL.'/uploads/'.$product['path'].'/'.$product['image'] ?>" alt="...">
          <div class="caption">
            <h4><a href="<?= BASE_URL.'/product.php?category_id='.$category['id'].'&id='.$product['id'] ?>"><?= $product['title'] ?></a></h4>
            <div class="btn-group btn-group-justified">
              <a href="#" class="btn btn-default" role="button"><?= $product['price'] ?> тг</a>
              <a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Купить</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

<?php require VIEW_ROOT.'/templates/footer.php'; ?>