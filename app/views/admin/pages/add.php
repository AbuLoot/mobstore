<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>
  
  <h2>Add Page</h2>

  <form action="<?= BASE_URL ?>/admin/pages/add.php" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="meta_title">Meta title</label>
      <input type="text" class="form-control" name="meta_title" id="meta_title">
    </div>
    <div class="form-group">
      <label for="meta_description">Meta description</label>
      <input type="text" class="form-control" name="meta_description" id="meta_description">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>