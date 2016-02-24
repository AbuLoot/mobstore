<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>
  
  <h2>Add Section</h2>

  <form action="<?= BASE_URL ?>/admin/section/add.php" method="POST">
    <div class="form-group">
      <label for="sort_id">Sort id</label>
      <input type="text" class="form-control" name="sort_id" id="sort_id">
    </div>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>