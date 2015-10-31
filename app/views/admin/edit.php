<?php require VIEW_ROOT . '/templates/header.php'; ?>
  
  <h2>Edit Page</h2>

  <form action="<?= BASE_URL ?>/admin/edit.php" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?= e($page['title']); ?>">
    </div>
    <div class="form-group">
      <label for="label">Label</label>
      <input type="text" class="form-control" name="label" id="label" value="<?= e($page['label']); ?>">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="<?= e($page['slug']); ?>">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" id="body" rows="10"><?= e($page['body']); ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $page['id']; ?>">
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>