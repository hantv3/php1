<?php
  require_once './db.php';

  $name = $_POST['name'];
  $feature_image = $_FILES['feature_image'];
  $cate_id = $_POST['cate_id'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  
  $checkNameBook = "SELECT * FROM books where name = '$name'";

  $existedBook = executeQuery($checkNameBook, false);
  $errors = "";
  if($name == ""){
      $errors .= "name-err= Không được bỏ trống tên";
  }else if(strlen($name) < 4 || strlen($name) > 40){
      $errors .= "name-err= Tên sách phải lớn 4 & nhỏ hơn 40 kí tự";
  }else if($existedBook != false){
      $errors .= "name-err= Tên đã tồn tại";
  }

  if($price == 0){
    $errors .= "&price-err= Không được để trống giá sản phầm bằng 0";
  }else if($price < 0){
    $errors .= "&price-err= Không được để trống giá sản phầm nhỏ hơn 0";
  }

  if($description == ""){
    $errors .= "&desc-err= Không được để trống mô tả";
  }else if(strlen($description) > 5000){
    $errors .= "&desc-err= Không được mô tả quá 5000";
  }

  if(strlen($errors) > 0){
      header('location: add_new_book.php?'.$errors);
      die;
  }
  $file_name = "";

  $filename = "";
  if($feature_image['size'] > 0){  
    # 2. Đặt tên cho file
    $filename = uniqid() . '-' . $feature_image['name'];

    # 3. Lưu file
    move_uploaded_file($feature_image['tmp_name'], './uploads/' . $filename);
    $filename = 'uploads/' . $filename;
  }


  $insertBookQuery = "insert into books (name, feature_image, cate_id, price, description)
                                values ('$name', '$file_name', '$cate_id', '$price', '$description')";
                                executeQuery($insertBookQuery);
                                header('location: ' . BASE_URL);
 ?>
