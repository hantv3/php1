<?php
    require_once './db.php';

    $listCatesQuery = "SELECT * FROM categories";

    $cates = executeQuery($listCatesQuery);

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
<body>
    <div class="container">
        <?php include_once './header.php'; ?>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>
                    <a href="<?= BASE_URL. './add_new_cate.php'?>" class="btn btn-sm btn-success">Add new</a>
                </th>
            </thead>
            <tbody>
               <?php foreach ($cates as $key):?>
               <tr>
                   <td><?= $key['id']?></td>
                   <td><?= $key['name']?></td>
                   <td><?= $key['slug']?></td>
                   <td>
                    <a href="<?= BASE_URL. './edit_cate.php?id='. $key['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= BASE_URL. './remove_cate.php?id='. $key['id'] ?>" class="btn btn-sm btn-danger">Remove</a>
                   </td>
               </tr>
               <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
