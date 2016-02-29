<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MobiStore</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <br>
    <nav>
      <div class="container">
        <?php if (empty($pages)) : ?>
          <p>Sorry, no pages at the moment.</p>
        <?php else: ?>
          <ul class="list-inline pull-left">
            <li><a href="<?= BASE_URL; ?>">Главная</a></li>
            <?php foreach ($pages as $nav_page) : ?>
              <li><a href="<?= BASE_URL; ?>/page.php?id=<?= $nav_page['slug']; ?>"><?= $nav_page['title']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <p class="pull-right hidden-xs">
          <span>+7 (123) 456-7890</span>,
          <span>+7 (123) 456-7890</span>
        </p>
      </div>
    </nav>

    <div class="container">
      <header class="row bg-header">
        <div class="col-md-6">
          <div class="clearfix"></div>
          <h1 class="logo"><a href="<?= BASE_URL; ?>">MobiStore</a></h1>
        </div>
        <div class="col-md-3">
          <br>
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-md-3">
          <br>
          <div class="dropdown">
            <button class="btn btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
              <span class="glyphicon glyphicon-shopping-cart"></span> Корзина
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            </ul>
          </div>
          <br>
        </div>
      </header>

      <!-- Menu -->
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav">
            <?php foreach ($section as $key => $item) : ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $item['title'] ?> <span class="caret"></span></a>
                <?php $categories = get_submenu($db, $item['id']); ?>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category) : ?>
                    <li><a href="<?= BASE_URL ?>/category.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endforeach; ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Смартфоны <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">HTC</a></li>
                <li><a href="#">NOKIA</a></li>
                <li><a href="#">Lenova</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Планшеты <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">iPad</a></li>
                <li><a href="#">Samsung</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Аксессуары <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Аккумуляторы</a></li>
                <li><a href="#">Зарядное устройство</a></li>
                <li><a href="#">Наушники</a></li>
                <li><a href="#">Другое</a></li>
              </ul>
            </li>
            <li><a href="#">Отзывы</a></li>
          </ul>
        </div>
      </nav>
