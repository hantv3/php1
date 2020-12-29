<?php
    require_once './db.php';
    $id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $curr_password = $_POST['curr_password'];
    $new_password = $_POST['new_password'];
    $conf_password = $_POST['conf_password'];

    $n = "";
    $n = $user_name;
    // $hassPass = password_hash($curr_password, PASSWORD_DEFAULT);

    $checkPass = "SELECT * FROM users WHERE id = $id";
    $password = executeQuery($checkPass, false);
    // var_dump($password);die;
    // var_dump($curr_password);die;

    $errors = "";
    #check user name
    if ($user_name == ""){
        $errors .= "user-err= Khong duoc de trong ten";
    }else if (strlen($user_name) < 4 || strlen($user_name) > 40){
        $errors .= "user-err= Ten phai khong duoc nho hon 4 ki tu hoac lon hon 40 ki tu";
    }

    #check password
    if(password_verify($curr_password, $password['password'])){
        $errors .= "&pass-err= Mat khau dung";
    }else{
        $errors .= "&pass-err= Mat khau sai";
    }
    #check pasword conf
    if($new_password != $conf_password){
        $errors .= "&pass-conf= Mat khau khong khop";
    }


    // var_dump($updateUserQuery);die;
    if(strlen($errors) > 0){
        header('location: edit_user.php?'.$errors);
        die;
    }
    $updateUserQuery = "UPDATE users SET name = '$user_name', email = '$email', password = '$conf_password' WHERE id = $id";
    executeQuery($updateUserQuery);
    header('location:' . BASE_URL . '/user.php');
?>
<?php
  
 ?>
