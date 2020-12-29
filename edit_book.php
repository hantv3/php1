<?php
  require_once './db.php';

  $id = $_GET['id'];
  $listCatesQuery = "SELECT * FROM categories";
  $lineBookQuery = "SELECT b.*, c.`name` as cate_name FROM books b JOIN categories c WHERE b.id = $id";
  $cate = executeQuery($listCatesQuery);
  $book = executeQuery($lineBookQuery, false);
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
adwaedwde
  <div class="container">
    <h2 class="text-center">UPDATE BOOK</h2>
    <form action="<?= BASE_URL. 'update_book.php?id='.$book['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="col-6 offset-3">
          <div class="form-group">
            <label>Book name</label>
            <input type="text" name="name" class="form-control" value="<?= $book['name']?>">
          </div>
           <div class="form-group">
            <label>Image</label>
            <input type="file" name="feature_image" class="form-control" value="<?= $book['name']?>">
          </div>
           <div class="form-group">
            <label>Category</label>
            <select name="cate_id" class="form-control">
              <?php foreach( $cate as $key): ?>
              <option <?php if($key['id'] == $book['cate_id']):?> selected <?php endif?> value="<?= $key['id']?>"><?= $key['name']?></option>
              <?php endforeach ?>
            </select>
          </div>
           <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="<?= $book['description']?>">
          </div>
           <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="<?= $book['price']?>">
          </div>
           <div class="form-group">
            <button class="btn btn-sm btn-success">Update</button>
          </div>
        </div>
    </form>
  </div>
</body>
</html>
