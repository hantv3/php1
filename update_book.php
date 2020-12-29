<?php
    require_once './db.php';
    $id = $_GET['id'];

    $lineBookQuery = "SELECT * FROM books WHERE id = $id";
    $book = executeQuery($lineBookQuery, false);

    $name = $_POST['name'];
    $feature_image = $_FILES['feature_image'];
    $cate_id = $_POST['cate_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];


    $filename = $book['feature_image'];

    if($feature_image['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($feature_image['tmp-name'], './uploads/' . $filename);
        $filename = './uploads/' . $filename;
    }
    $updateBookQuery = "UPDATE books SET name = '$name', feature_image = '$filename', cate_id = '$cate_id', price = '$price', description = '$description'
                            WHERE id = $id";
                            executeQuery($updateBookQuery);
                            // var_dump($updateBookQuery);die;
                            header('location: ' . BASE_URL);
?>