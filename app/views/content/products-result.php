<?php require VIEW_ROOT.'/templates/header.php'; ?>

  <h4>Результат поиска по запросу "<?= $keywords ?>"</h4>

  <?php if (!empty($products)) : ?>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <a href="<?= BASE_URL.'/product.php?category_id='.$product['category_id'].'&id='.$product['id'] ?>"><img src="<?= BASE_URL.'/uploads/'.$product['path'].'/'.$product['image'] ?>" alt="..."></a>
            <div class="caption">
              <h4><a href="<?= BASE_URL.'/product.php?category_id='.$product['category_id'].'&id='.$product['id'] ?>"><?= $product['title'] ?></a></h4>
              <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-default" role="button"><?= $product['price'] ?> тг</a>
                <a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Купить</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <p>Ничего не найдено</p>
  <?php endif; ?>

<?php require VIEW_ROOT.'/templates/footer.php'; ?>