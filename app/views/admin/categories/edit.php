<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>
  
  <h2>Edit category</h2>

  <form action="<?= BASE_URL ?>/admin/categories/edit.php" method="POST">
    <div class="form-group">
      <label for="sort_id">Sort id</label>
      <input type="text" class="form-control" name="sort_id" id="sort_id" value="<?= e($category['sort_id']) ?>">
    </div>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?= e($category['title']); ?>">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="<?= e($category['slug']); ?>">
    </div>
    <div class="form-group">
      <label for="section">Section</label>
      <select class="form-control" name="section_id">
        <?php foreach ($section as $item) : ?>
          <?php if ($item['id'] == $category['section_id']) : ?>
            <option value="<?= $item['id'] ?>" selected><?= $item['title'] ?></option>
          <?php else : ?>
            <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="meta_title">Meta title</label>
      <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?= e($category['meta_title']) ?>">
    </div>
    <div class="form-group">
      <label for="meta_description">Meta description</label>
      <input type="text" class="form-control" name="meta_description" id="meta_description" value="<?= e($category['meta_description']) ?>">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="10"></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $category['id']; ?>">
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>