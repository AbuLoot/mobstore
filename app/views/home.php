<?php require VIEW_ROOT . '/templates/header.php'; ?>

  <!-- Slide -->
  <div class="jumbotron">
    <h1>MobiStore</h1>
    <p>Магазин телефонов</p>
  </div>

  <!-- Hot products -->
  <div class="row">
    <div class="col-md-9">
      <h3><span class="glyphicon glyphicon-star"></span> Популярное</h3>
    </div>
    <div class="col-md-3">
      <h3 class="btn-group pull-right">
        <a class="btn btn-primary btn-sm" href="#hot-products" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="btn btn-primary btn-sm" href="#hot-products" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </h3>
    </div>
  </div>

  <div id="hot-products" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner" role="listbox">
    	<?php $hot_products_chunk = array_chunk($hot_products, 4); ?>
    	<?php foreach ($hot_products_chunk as $key => $hot_products) : ?>
	      <div class="item <?php if ($key == 0) echo 'active'; ?>">
	        <div class="row">
	        	<?php foreach ($hot_products as $hot_product) : ?>
	          <div class="col-sm-6 col-md-3">
	            <div class="thumbnail">
	              <img src="<?= BASE_URL.'/uploads/'.$hot_product['path'].'/'.$hot_product['image'] ?>" alt="...">
	              <div class="caption">
	                <h4><a href="<?= BASE_URL.'/product.php?id='.$hot_product['id'] ?>"><?= $hot_product['title'] ?></a></h4>
	                <div class="btn-group">
	                  <a href="#" class="btn btn-default" role="button"><?= $hot_product['price'] ?> тг</a>
	                  <a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Купить</a>
	                </div>
	              </div>
	            </div>
	          </div>
	        	<?php endforeach; ?>
	        </div>
	      </div>
    	<?php endforeach; ?>
    </div>
  </div>

  <!-- New products -->
  <div class="row">
    <div class="col-md-9">
      <h3><span class="glyphicon glyphicon-star"></span> Новые</h3>
    </div>
    <div class="col-md-3">
      <h3 class="btn-group pull-right">
        <a class="btn btn-primary btn-sm" href="#new-products" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="btn btn-primary btn-sm" href="#new-products" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </h3>
    </div>
  </div>

  <div id="new-products" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner" role="listbox">
    	<?php $new_products_chunk = array_chunk($new_products, 4); ?>
    	<?php foreach ($new_products_chunk as $key => $new_products) : ?>
	      <div class="item <?php if ($key == 0) echo 'active'; ?>">
	        <div class="row">
	        	<?php foreach ($new_products as $new_product) : ?>
	          <div class="col-sm-6 col-md-3">
	            <div class="thumbnail">
	              <img src="<?= BASE_URL.'/uploads/'.$new_product['path'].'/'.$new_product['image'] ?>" alt="...">
	              <div class="caption">
	                <h4><a href="<?= BASE_URL.'/product.php?id='.$hot_product['id'] ?>"><?= $new_product['title'] ?></a></h4>
	                <div class="btn-group">
	                  <a href="#" class="btn btn-default" role="button"><?= $new_product['price'] ?> тг</a>
	                  <a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Купить</a>
	                </div>
	              </div>
	            </div>
	          </div>
	        	<?php endforeach; ?>
	        </div>
	      </div>
    	<?php endforeach; ?>
    </div>
  </div>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>