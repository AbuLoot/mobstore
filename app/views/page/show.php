<?php require VIEW_ROOT . '/templates/header.php'; ?>
  <?php if ( ! $page) : ?>
    <p>No page found, sorry.</p>
  <?php else: ?>
    <h2><?= e($page['title']); ?></h2>
    <?= e($page['body']); ?>
    <p class="text-muted">
      Created on <?= $page['created']->format('jS M Y'); ?>
      <?php if ($page['updated']) : ?>
        Last updated <?= $page['updated']->format('jS M Y h:i a'); ?>
      <?php endif; ?>
    </p>
  <?php endif; ?>
<?php require VIEW_ROOT . '/templates/footer.php'; ?>