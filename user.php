<?php
    require_once './db.php';

    $listUsersQuery = "SELECT * FROM users";

    $users = executeQuery($listUsersQuery);

    // varDump($books);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body
    <div class="container">
        <?php include_once './header.php'; ?>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>
                    <a href="<?= BASE_URL. './add_new_user.php'?>" class="btn btn-sm btn-success">Add new</a>
                </th>
            </thead>
            <tbody>
               <?php foreach ($users as $key):?>
               <tr>
                   <td><?= $key['id']?></td>
                   <td><?= $key['name']?></td>
                   <td><?= $key['email']?></td>
                   <td>
                    <a href="<?= BASE_URL. 'edit_user.php?id='. $key['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= BASE_URL. 'remove_user.php?id='. $key['id'] ?>" class="btn btn-sm btn-danger">Remove</a>
                   </td>
               </tr>
               <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
