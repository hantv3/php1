<?php
    require_once './db.php';

    $cate_name = $_POST['cate_name'];
    $slug = $_POST['slug'];

    $checkNameCate = "SELECT * FROM categories where name = '$cate_name'";
    $checkNameSlug = "SELECT * FROM categories where slug = '$slug'";

    $existedCate = executeQuery($checkNameCate, false);
    $checkNameSlug = executeQuery($checkNameSlug, false);
    // var_dump($checkNameSlug);die;
    
    $errors = "";
    if($cate_name == ""){
        $errors .= "name-err= Không được bỏ trống tên";
    }else if(strlen($cate_name) < 4 || strlen($cate_name) > 40){
        $errors .= "name-err= Tên sách phải lớn 4 & nhỏ hơn 40 kí tự";
    }else if($existedCate != false){
        $errors .= "name-err= Tên đã tồn tại";
    }

    if($slug == ""){
        $errors .= "&slug-err= Không được bỏ trống tên duong dan";
    }else if(strlen($slug) < 4 || strlen($slug) > 40){
        $errors .= "&slug-err= Tên duong dan phải lớn 4 & nhỏ hơn 40 kí tự";
    }else if($checkNameSlug != false){
        $errors .= "&slug-err= Tên duong dan đã tồn tại";
    }

    if(strlen($errors) > 0){
        header('location: add_new_cate.php?'.$errors);
        die;
    }
    $insertCateQuery = "INSERT INTO categories (name, slug) values ('$cate_name', '$slug')";
                                executeQuery($insertCateQuery);
                                // var_dump($insertCateQuery);die;
                                header('location: ' . BASE_URL. '/categories.php');

?>