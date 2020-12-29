<?php
    require_once './db.php';
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertUserQuery = "INSERT INTO users (name, email, password) values ('$user_name', '$email', '$hashPassword')";
                                    executeQuery($insertUserQuery);
                                    // var_dump($insertUserQuery);die;
                                    header("location: " . BASE_URL . '/user.php');
?>