<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

  <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/section/add.php">Add section</a></p>

  <?php if (empty($section)): ?>
    <p>No section at the moment</p>
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
        <?php foreach ($section as $item) : ?>
          <tr>
            <td><a href="<?= BASE_URL ?>/item.php?item=<?= e($item['slug']); ?>"><?= e($item['slug']); ?></a></td>
            <td><?= e($item['title']); ?></td>
            <td><a href="<?= BASE_URL ?>/admin/section/edit.php?id=<?= $item['id'] ?>">Edit</a></td>
            <td><a href="<?= BASE_URL ?>/admin/section/delete.php?id=<?= $item['id'] ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>