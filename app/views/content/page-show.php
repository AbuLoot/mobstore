<?php require VIEW_ROOT.'/templates/header.php'; ?>

  <?php if ( ! $page) : ?>
    <p>No page found, sorry.</p>
  <?php else: ?>
    <h2><?= e($page['title']); ?></h2>
    <?= $page['content'] ?>
  <?php endif; ?>

<?php require VIEW_ROOT.'/templates/footer.php'; ?>