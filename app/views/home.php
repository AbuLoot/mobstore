<?php require VIEW_ROOT . '/templates/header.php'; ?>

  <!-- Slide -->
  <div class="jumbotron">
    <h1>MobiStore</h1>
    <p>Магазин телефонов</p>
  </div>

  <?php if (empty($pages)) : ?>
    <p>Sorry, no pages at the moment.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($pages as $page) : ?>
        <li><a href="<?= BASE_URL; ?>/page.php?id=<?= $page['slug']; ?>"><?= $page['title']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>