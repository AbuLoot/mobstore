<?php require VIEW_ROOT . '/templates/header.php'; ?>
  
  <h2>Add Page</h2>

  <form action="<?= BASE_URL ?>/admin/add.php" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="label">Label</label>
      <input type="text" class="form-control" name="label" id="label">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" id="body" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>