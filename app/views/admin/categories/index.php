<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

  <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/categories/add.php">Add category</a></p>

  <?php if (empty($categories)): ?>
    <p>No category at the moment</p>
  <?php else : ?>
    <table class="table">
      <thead>
        <tr>
          <th>Slug</th>
          <th>Section</th>
          <th>Title</th>
          <th colspan="2">Functions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $category) : ?>
          <tr>
            <td><a href="<?= BASE_URL ?>/category.php?category=<?= e($category['slug']); ?>"><?= e($category['slug']); ?></a></td>
            <td><?= e($category['section_title']); ?></td>
            <td><?= e($category['title']); ?></td>
            <td><a href="<?= BASE_URL ?>/admin/categories/edit.php?id=<?= $category['id'] ?>">Edit</a></td>
            <td><a href="<?= BASE_URL ?>/admin/categories/delete.php?id=<?= $category['id'] ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>