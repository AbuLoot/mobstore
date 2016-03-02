
  <?php if (isset($_SESSION['notifications'])) : ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php foreach ($_SESSION['notifications'] as $key => $notifications) : ?>
        <ul>
          <?php foreach ($notifications as $notification) : ?>
            <li><?= $key . ' - ' . $notification ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php unset($_SESSION['notifications']); ?>
