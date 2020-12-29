<?php
    require_once './db.php';
    $id = $_GET['id'];

    $removeUserQuery = "DELETE FROM users WHERE id = $id";
    executeQuery($removeUserQuery);
    header('location:'.BASE_URL . '/user.php');
?>