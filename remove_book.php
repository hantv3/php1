<?php
    require_once 'db.php';
    $id = $_GET['id'];

    $removeBookQuery = "DELETE FROM books WHERE id = '$id'";

    executeQuery($removeBookQuery);

    header("Location:" . BASE_URL);
?>