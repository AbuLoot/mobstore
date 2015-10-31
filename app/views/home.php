<?php require VIEW_HEADER; ?>
    
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
                <li><a href="<?= BASE_URL; ?>/page.php?page=<?= $page['slug']; ?>"><?= $page['label']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php require VIEW_FOOTER; ?>