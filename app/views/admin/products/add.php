<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>
  
  <h2>Add Product</h2>

  <?php require VIEW_ROOT . '/templates/alerts.php'; ?>

  <form action="<?= BASE_URL ?>/admin/products/add.php" method="POST" enctype='multipart/form-data'>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="categories">Categories</label>
      <select class="form-control" name="category_id" id="categories">
        <?php foreach ($section as $item) : ?>
          <optgroup label="<?= $item['title'] ?>">
            <?php $categories = get_submenu($db, $item['id']); ?>
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
            <?php endforeach; ?>
          </optgroup>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Images</label>
      <input type="file" class="form-control" name="images[]" multiple><br>
      <input type="file" class="form-control" name="images[]" multiple><br>
      <input type="file" class="form-control" name="images[]" multiple><br>
      <input type="file" class="form-control" name="images[]" multiple><br>
      <input type="file" class="form-control" name="images[]" multiple><br>
      <input type="file" class="form-control" name="images[]" multiple>
    </div>
    <div class="form-group">
      <label for="company">Company</label>
      <input type="text" class="form-control" name="company" id="company">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" id="price">
    </div>
    <div class="form-group">
      <label for="count">Count</label>
      <input type="number" class="form-control" name="count" id="count">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="characteristic">Characteristic</label>
      <textarea class="form-control" name="characteristic" id="characteristic" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <input type="number" class="form-control" name="status" id="status" value="1">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>