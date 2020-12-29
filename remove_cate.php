<?php
    require_once './db.php';
    $id = $_GET['id'];
    $removeCateQuery = "DELETE FROM categories WHERE id = $id";
    executeQuery($removeCateQuery);
    // var_dump($removeCateQuery);die;
    header("location: " . BASE_URL . './categories.php');
?>