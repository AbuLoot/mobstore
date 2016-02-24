<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

  <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/pages/add.php">Add page</a></p>

  <?php if (empty($pages)): ?>
    <p>No pages at the moment</p>
  <?php else : ?>
    <table class="table">
      <thead>
        <tr>
          <th>Slug</th>
          <th>Title</th>
          <th colspan="2">Functions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pages as $page) : ?>
          <tr>
            <td><a href="<?= BASE_URL ?>/page.php?page=<?= e($page['slug']); ?>"><?= e($page['slug']); ?></a></td>
            <td><?= e($page['title']); ?></td>
            <td><a href="<?= BASE_URL ?>/admin/pages/edit.php?id=<?= $page['id'] ?>">Edit</a></td>
            <td><a href="<?= BASE_URL ?>/admin/pages/delete.php?id=<?= $page['id'] ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>