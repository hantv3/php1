<?php
  require_once './db.php';
  $listCatesQuery = "SELECT * FROM categories";

  $cates = executeQuery($listCatesQuery);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new books</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <?php include_once './header.php'; ?>

  <div class="container">
    <h2 class="text-center">ADD NEW BOOKS</h2>
    <form action="save_new_book.php" method="post" enctype="multipart/form-data">
        <div class="col-6 offset-3">
          <div class="form-group">
            <label>Book name</label>
            <input type="text" name="name" class="form-control">
            <?php if(isset($_GET['name-err'])):?>
              <span class="text-danger"><?= $_GET['name-err']?></span>
            <?php endif ?>
          </div>
           <div class="form-group">
            <label>Image</label>
            <input type="file" name="feature_image" class="form-control">
          </div>
           <div class="form-group">
            <label>Category</label>
            <select name="cate_id" class="form-control">
              <?php foreach( $cates as $key): ?>
              <option value="<?= $key['id']?>"><?= $key['name']?></option>
              <?php endforeach ?>
            </select>
          </div>
           <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control">
            <?php if(isset($_GET['desc-err'])):?>
              <span class="text-danger"><?= $_GET['desc-err']?></span>
            <?php endif ?>
          </div>
           <div class="form-group">
            <label>Price</label>
            <input type="number" name="price"  class="form-control">
            <?php if(isset($_GET['price-err'])):?>
              <span class="text-danger"><?= $_GET['price-err']?></span>
            <?php endif ?>
          </div>
           <div class="form-group">
            <button class="btn btn-sm btn-success">Add new</button>
          </div>
        </div>
    </form>
  </div>
</body>
</html>
