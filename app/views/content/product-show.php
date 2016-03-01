<?php require VIEW_ROOT.'/templates/header.php'; ?>

  <ol class="breadcrumb">
    <li><a href="<?= BASE_URL ?>"><span class="glyphicon glyphicon-home"></span> Главная</a></li>
    <li><a href="<?= BASE_URL ?>/category.php?slug=<?= $category['slug'] ?>"><?= $category['title'] ?></a></li>
    <li class="active"><?= $product['title'] ?></li>
  </ol>

  <div class="row">
    <div class="col-md-6">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <div class="thumbnail">
              <img src="bower_components/bootstrap/dist/img/SmartPhones/Apple/1.jpg" class="img-responsive">
            </div>
          </div>
          <div class="item">
            <div class="thumbnail">
              <img src="bower_components/bootstrap/dist/img/SmartPhones/Apple/2.jpg" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
      <ol class="list-inline">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="col-md-2 active">
          <a href="#" class="thumbnail">
            <img src="bower_components/bootstrap/dist/img/SmartPhones/Apple/1.jpg" class="img-responsive">
          </a>
        </li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class="col-md-2">
          <a href="#" class="thumbnail">
            <img src="bower_components/bootstrap/dist/img/SmartPhones/Apple/2.jpg" class="img-responsive">
          </a>
        </li>
      </ol>
    </div>
    <div class="col-md-6">
      <h2><?= $product['title'] ?></h2>
      <table class="table">
        <tbody>
          <tr>
            <td>Производитель:</td>
            <td><?= $product['company'] ?></td>
          </tr>
          <tr>
            <td>Наличие:</td>
            <td><?= $product['count'] ?></td>
          </tr>
          <tr>
            <td>Количество:</td>
            <td><input type="number" class="form-control input-sm" value="1"></td>
          </tr>
          <tr>
            <td>Цена:</td>
            <td><?= $product['price'] ?> тг</td>
          </tr>
        </tbody>
      </table>
      <p><a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Купить</a></p>
    </div>
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#description" aria-controls="description" data-toggle="tab">Описание</a></li>
        <li><a href="#characteristic" aria-controls="characteristic" data-toggle="tab">Характеристики</a></li>
        <li><a href="#comments" aria-controls="comments" data-toggle="tab">Комментарии</a></li>
      </ul>
      <br>
      <div class="tab-content">
        <div class="tab-pane active" id="description">
          <?= $product['description'] ?>
        </div>
        <div class="tab-pane" id="characteristic">
          <?= $product['characteristic'] ?>
        </div>
        <div class="tab-pane" id="comments">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img src="bower_components/bootstrap/dist/img/1.jpg" class="media-object" width="100">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Middle aligned media</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img src="bower_components/bootstrap/dist/img/2.jpg" class="media-object" width="100">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Middle aligned media</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          <hr>
          <h3>Add your review</h3>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
              <select class="form-control">
                <option>1 star</option>
                <option>2 star</option>
                <option>3 star</option>
                <option>4 star</option>
                <option>5 star</option>
              </select>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" placeholder="Review"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
      <br>
    </div>
  </div>

<?php require VIEW_ROOT.'/templates/footer.php'; ?>