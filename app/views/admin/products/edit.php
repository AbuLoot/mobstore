<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>
  
  <h2>Edit Product</h2>

  <form action="<?= BASE_URL ?>/admin/products/edit.php" method="POST" enctype='multipart/form-data'>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?= e($product['title']) ?>">
    </div>
    <div class="form-group">
      <label for="categories">Categories</label>
      <select class="form-control" name="category_id" id="categories">
        <?php foreach ($categories as $category) : ?>
          <?php if ($category['id'] == $product['category_id']) : ?>
            <option value="<?= $category['id'] ?>" checked><?= $category['title'] ?></option>
          <?php else: ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Images</label>
      <?php $images = unserialize($product['images']); ?>
      <input type="hidden" name="old_images" value="<?= e($product['images']) ?>">
      <input type="hidden" name="path_images" value="<?= $product['path'] ?>">
      <?php for ($i = 0; $i < count($images); $i++) : ?>
        <?php if (isset($images[$i])) : ?>
          <div class="row">
            <div class="col-md-3">
              <img class="img-responsive" src="<?= BASE_URL . '/uploads/' . $product['path'] . '/' . $images[$i]['mini_image']; ?>"><br>
            </div>
            <div class="col-md-9">
              <input type="file" class="form-control" name="images[]" multiple><br>
            </div>
          </div>
        <?php else : ?>
          <div class="row">
            <div class="col-md-3">
              <img class="img-responsive" src="<?= BASE_URL ?>/uploads/no-image.png"><br>              
            </div>
            <div class="col-md-9">
              <input type="file" class="form-control" name="images[]" multiple><br>
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
    <div class="form-group">
      <label for="company">Company</label>
      <input type="text" class="form-control" name="company" id="company" value="<?= e($product['company']) ?>">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" id="price" value="<?= e($product['price']) ?>">
    </div>
    <div class="form-group">
      <label for="count">Count</label>
      <input type="number" class="form-control" name="count" id="count" value="<?= e($product['count']) ?>">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="10"><?= e($product['description']) ?></textarea>
    </div>
    <div class="form-group">
      <label for="characteristic">Characteristic</label>
      <textarea class="form-control" name="characteristic" id="characteristic" rows="10"><?= e($product['characteristic']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>