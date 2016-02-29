<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MobiStore</title>

    <link href="<?= BASE_URL ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/bower_components/bootstrap/dist/css/styles.css" rel="stylesheet">

    <?php if (isset($scripts)) : ?>
      <?php foreach ($scripts as $script) : ?>
        <?php require $script; ?>
      <?php endforeach; ?>
    <?php endif; ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <br>
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= BASE_URL ?>/admin">Admin</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <?php $uri = $_SERVER['REQUEST_URI']; ?>
            <li <?php if (strpos($uri, 'pages')) echo 'class="active"'; ?>><a href="<?= BASE_URL ?>/admin/pages">Pages</a></li>
            <li <?php if (strpos($uri, 'section')) echo 'class="active"'; ?>><a href="<?= BASE_URL ?>/admin/section">Section</a></li>
            <li <?php if (strpos($uri, 'categories')) echo 'class="active"'; ?>><a href="<?= BASE_URL ?>/admin/categories">Categories</a></li>
            <li <?php if (strpos($uri, 'products')) echo 'class="active"'; ?>><a href="<?= BASE_URL ?>/admin/products">Products</a></li>
          </ul>
        </div>
      </nav>